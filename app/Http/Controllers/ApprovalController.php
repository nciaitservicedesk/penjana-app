<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\FormPreviewTrait;
use App\Applicant;
use App\ApplicantSignInfo;
use App\ApplicationForm;
use App\ApplicationStatus;
use App\ApplicationState;
use App\ApplicationHistory;
use App\ApplicationFile;
use App\ContactInfo;
use App\AssistInfo;
use App\PrequalifyCheck;
use App\Employee;
use App\Financial;
use App\RecruitPax;
use App\RecruitPlan;
use App\SupportDoc;
use App\Officer;
use App\Role;
use App\FlowState;
use App\AssessmentScorecard;
use App\CommitteeAction;
use App\Mail\ActivateAccount;
use Log;
use DateTime;
use DateInterval;
use DatePeriod;
use PDF;

class ApprovalController extends Controller
{
    use FormPreviewTrait;

    public function devBypass($id)
    {
        $officer = Officer::find($id);
        $role = Role::find($officer->role_id);
        session([
            'userId' =>  $officer->id,
            'userRoleId' =>  $officer->role_id,
            'userRole' =>  $role->name,
            'userName' =>  'Testing '.$role->name,
        ]);

        return redirect('/officer/appList');
    }

    public function viewAppList()
    {
        if (!session('userName')) 
        {
            return redirect('/officer/timeout');
        }

        if(session('userRoleId') == config('enums.role')['COMM'])
        {//committee have to use different select because 3pax need make decision
            $records = DB::select(
                'SELECT SUBSTRING(afs.ref_no, -3, 3) as ref_no, afs.ssm_no, afs.co_name, '.
                'afs.sector,fs.officer_in_charge, r.name as officer_name, aps.app_id, aps.state_id, '.
                'fs.name as status_name, '.
                'ifnull(aps.end_at, aps.updated_at) as last_update, aps.created_at as submission_date, '.
                'if((fs.officer_in_charge = '. session("userRoleId") .' AND cmma.action is null), 1 ,0) as required_action '.
                'FROM `application_states` aps '.
                'join flow_states fs on aps.state_id = fs.id '.
                'join application_forms afs on aps.app_id = afs.id '.
                'left join roles r on fs.officer_in_charge = r.id '.
                'left join committee_actions cmma on aps.app_id  = cmma.app_id and cmma.user_id = '. session("userId") . ' '.
                'order by required_action desc, submission_date desc',
            );
            
        }
        else
        {
            $records = DB::select(
                'SELECT SUBSTRING(afs.ref_no, -3, 3) as ref_no, afs.ssm_no, afs.co_name, '.
                'afs.sector,fs.officer_in_charge, r.name as officer_name, aps.app_id, aps.state_id, '.
                'fs.name as status_name, '.
                'ifnull(aps.end_at, aps.updated_at) as last_update, aps.created_at as submission_date, if((fs.officer_in_charge = ?), 1 ,0) as required_action '.
                'FROM `application_states` aps '.
                'join flow_states fs on aps.state_id = fs.id '.
                'join application_forms afs on aps.app_id = afs.id '.
                'left join roles r on fs.officer_in_charge = r.id '.
                'order by required_action desc, submission_date desc',
                [session('userRoleId')]
            );
        }
        //Log::info($records);
        $records = json_decode(json_encode($records), true);
        foreach($records as &$record)
        {
            $record['last_update'] = date_format(date_create($record['last_update']), 'd-m-Y');
            $record['submission_date'] = date_format(date_create($record['submission_date']), 'd-m-Y');
            $lastDate = !empty($record['officer_in_charge'])? 'NOW' : $record['last_update'];
            $record['day_left'] = $this->cal7days($record['submission_date'], $lastDate );
        }
        //Log::Info(session()->all());
        //Log::Info($records);
        return view('applicationList')->with([
            'tblData' => $records
        ]);
    }

    protected function cal7days($startDate, $endDate)
    {
        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);
        $begin = $begin->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);
        $day=0;
        $holiday=[];
        foreach($daterange as $date){
            if(in_array($date->format('N'), [6,7]) || in_array($date->format('d-m-Y'), $holiday))
                continue;
            else
                ++$day;
        }
        return 7-$day;
    }

    public function viewAppDetail($appId)
    {
        if (!session('userName')) 
        {
            return redirect('/officer/timeout');
        }

        $prevData= $this->getFullPreviewByAppId($appId);
        $appState = ApplicationState::where('app_id', '=', $appId)->latest()->first();
        $letter = ApplicationFile::where('app_id', '=', $appId)
            ->where(function($query){
                $query->where('content_type','=', config('enums.applicationFileContentType')['LOA'])
                ->orWhere('content_type','=', config('enums.applicationFileContentType')['REJ_LTR']);
            })->latest()->first();
        //Log::info($appState);
        $appForm = ApplicationForm::find($appId);
        $flowState = FlowState::find($appState->state_id);

        $appHistory = ApplicationHistory::where('app_id', '=', $appId)->orderBy('action_date', 'desc')->first();
        if(isset($appHistory->state_id))
        {
            $lastState = FlowState::find($appHistory->state_id)->name;
        }
        else
        {
            $lastState = '';
        }
        $review['currentStateId'] = $flowState->id;
        $review['forward_action'] = $flowState->forward_action;
        $review['backward_action'] = $flowState->backward_action;
        $review['refNo'] = $appForm->ref_no;
        $review['Status'] = $flowState->name;
        $review['last_status'] =$lastState;
        $review['comment'] = $appHistory->comment;
        $review['last_action'] = $appHistory->action;
        $review['comment_by'] = $appHistory->by_name;
        $review['approved_pax'] = $appHistory->approved_pax;
        $review['approved_fund'] = $appHistory->approved_fund;
        
        //$review['showLoa'] = $appState->state_id > config('enums.role')['COMM']? '';
        $review['letter_file'] = isset($letter->original_name)?$letter->original_name :null;
        $review['letter_path'] = url('letter/'.$appId);//storage_path('letter/'.$appId.'/LOA/');
        $review['filePath'] = url('appFile/'.$appId);
        if(AssessmentScorecard::where('app_id', '=', $appId)->exists())
        {
            $sc = AssessmentScorecard::where('app_id', '=', $appId)->latest()->first();
            $review['inputyear'] = $sc->year_in_op; 
            $review['inputstaff'] = $sc->no_staff; 
            $review['inputfiscal'] = $sc->fiscal_health; 
            $review['inputtechnical'] = $sc->tech_cap;
            $review['inputtraining'] = $sc->training_prog;
            $review['inputncer'] = $sc->val_pro;
            
        }
        $review['appealFiles'] = [];
        if(ApplicationHistory::where([['app_id','=',$appForm->id],['state_id', '=', config('enums.flowStateId')['Start_APPEAL']]])->exists())
        {
            $review['appealComment'] = ApplicationHistory::where([['app_id','=',$appForm->id],['state_id', '=', config('enums.flowStateId')['Start_APPEAL']]])
                ->first()->comment;
            $review['appealFiles'] = ApplicationFile::where('app_id', '=', $appForm->id)
                ->where('content_type', '=', config('enums.applicationFileContentType')['APPEAL_FILE'])
                ->get()->toArray();
        }

        //log::info($review);
        $domRights = $this->getRoleRights(session('userRoleId'), $flowState->officer_in_charge);
        $domRights['show_appeal'] = ApplicationHistory::where([['app_id','=',$appForm->id],['state_id', '=', config('enums.flowStateId')['Start_APPEAL']]])
            ->exists()?"1":"0";

        return view('appFormAppDetails')->with([
            'prevData' => $prevData,
            'review' => $review,
            'appId' => $appId,
            'domRights' => $domRights,
        ]);
    }

    public function postAppDetail(Request $request,$appId)
    {
        if (!session('userName')) 
        {
            return redirect('/officer/timeout');
        }
        //Log::info($request);

        $roleId = session('userRoleId');
        $roleRights =$this->getRoleRights($roleId);
        if($roleRights['scorecardWrite']=='1')
        {
            $sc = new AssessmentScorecard;
            $sc->app_id = $appId;
            $sc->year_in_op = $request->inputyear;
            $sc->no_staff = $request->inputstaff;
            $sc->fiscal_health = $request->inputfiscal;
            $sc->tech_cap = $request->inputtechnical;
            $sc->training_prog = $request->inputtraining;
            $sc->val_pro = $request->inputncer;
            $sc->save();
        }

        // set state and action
        if(isset($request->btnForward))
        {
            $stateId = $request->btnForward;
            if($roleId== config('enums.role')['COMM'])
            {
                $decision = 'Approve';
                $commActs = CommitteeAction::where([
                    ['action', '=', '1'],
                    ['app_id', '=', $appId]
                ])->get();
                if(count($commActs) < 2)
                {//should remain the same state
                    $stateId = $request->currentStateId;
                }

            }
            elseif($roleId == config('enums.role')['ENDORSE'])
            {
                $decision = 'Endorse';
            }
            else
            {
                $decision = 'Recommend';
            }
        }
        elseif(isset($request->btnReject))
        {
            $stateId = $request->btnReject;
            if($roleId== config('enums.role')['COMM'])
            {
                $decision = 'Reject';
            }
            else
            {
                $decision = 'Not Recommend';
            }  
        }

        $appHist = new ApplicationHistory;
        $appHist->app_id = $appId;
        $appHist->action = $decision;
        $appHist->approved_fund = $request->inputFund;
        $appHist->approved_pax = $request->inputPax;
        $appHist->by_name = session('userName')."(".session('userRole').")";
        $appHist->comment = $request->comment;
        $appHist->state_id = $request->currentStateId;
        $appHist->save();

        $appState = ApplicationState::where('app_id', '=', $appId)->first();
        $appState->app_id = $appId;
        $appState->state_id = $stateId;
        $appState->approved_pax = $request->inputPax;
        $appState->approved_fund = $request->inputFund;
        $appState->save();

        //additional action based on state
        switch($stateId)
        {
            case config('enums.flowStateId')['REJECT_APPEAL']:
                $appStatus = new ApplicationStatus;
                $appStatus->app_id = $appId;
                $appStatus->status_id = config('enums.applicationStatus')['APPEAL_REJECTED'];
                $appStatus->comment = $request->comment;
                $appStatus->save();
            break;

            case config('enums.flowStateId')['REJECT']:
                $filename = $this->generateRejectLetter($appId, false);
                $appFile = new ApplicationFile;
                $appFile->content_type = config('enums.applicationFileContentType')['REJ_LTR'];
                $appFile->original_name = $filename;
                $appFile->new_name = $filename;
                $appFile->app_id = $appId;
                $appFile->save();
                
                //get latest comment by commt 
                
                $appHistory = ApplicationHistory::where([
                    ['app_id', '=', $appId],
                    ['action', '=', 'Reject'],
                    ['state_id', '=', config('enums.flowStateId')['COMM']]
                ])->latest()->first();
                
                $appStatus = new ApplicationStatus;
                $appStatus->app_id = $appId;
                $appStatus->status_id = config('enums.applicationStatus')['REJECTED'];
                $appStatus->comment = $appHistory->comments;
                $appStatus->save();
            break;

            case config('enums.flowStateId')['COMM']:
                if($request->currentStateId ==config('enums.flowStateId')['COMM'])
                {
                    $commtAct = CommitteeAction::where([
                        ['app_id', '=', $appId],
                        ['user_id', '=', session('userId')],
                    ])->first();
                    $commtAct->action = isset($request->btnForward)? '1' : '0';
                    $commtAct->save();
                }
                else
                {
                    $officers = Officer::where('role_id', '=', config('enums.role')['COMM'])->get();
                    foreach($officers as $officer)
                    {
                        $commAct = new CommitteeAction;
                        $commAct->app_id =  $appId;
                        $commAct->user_id = $officer->id;
                        $commAct->save();
                    }
                }
                
            break;

            case config('enums.flowStateId')['LEGAL_LOA']:
                //generate LOA
                $filename = $this->generateLoa($appId, true);
                $appFile = new ApplicationFile;
                $appFile->content_type = config('enums.applicationFileContentType')['LOA'];
                $appFile->original_name = $filename;
                $appFile->new_name = $filename;
                $appFile->app_id = $appId;
                $appFile->save();
            break;

            case config('enums.flowStateId')['APPROVE']:
                $filename = $this->generateLoa($appId, false);
                $appFile = new ApplicationFile;
                $appFile->content_type = config('enums.applicationFileContentType')['LOA'];
                $appFile->original_name = $filename;
                $appFile->new_name = $filename;
                $appFile->app_id = $appId;
                $appFile->save();
                
                $appStatus = new ApplicationStatus;
                $appStatus->app_id = $appId;
                $appStatus->status_id = config('enums.applicationStatus')['APPROVED'];
                $appStatus->comment = "application has been approved.";
                $appStatus->save();
            break;

            case config('enums.flowStateId')['LEGAL_REJ_LETTER']:
                //generate reject letter
                $filename = $this->generateRejectLetter($appId, true);
                $appFile = new ApplicationFile;
                $appFile->content_type = config('enums.applicationFileContentType')['REJ_LTR'];
                $appFile->original_name = $filename;
                $appFile->new_name = $filename;
                $appFile->app_id = $appId;
                $appFile->save();
            break;

            case config('enums.flowStateId')['COMM_APPEAL']:
                CommitteeAction::where('app_id', '=', $appId)->update(['action' => null]);
            break;
        }

        return redirect('/officer/appList');

    }

    protected function generateLoa($appId, $isDraft)
    {
        $info = [];
        $appForm = ApplicationForm::find($appId);
        $appState = ApplicationState::where('app_id', '=', $appId)->latest()->first(); 
        $firstState = ApplicationState::where('app_id', '=', $appId)->orderBy('id', 'asc')->first();
        $subDate = new DateTime($firstState->created_at);
        $sign = ApplicantSignInfo::where('app_id', '=', $appId)->first();
        $addr = $appForm->reg_addr;

        $info['refNo'] = $appForm->ref_no;
        $info['printDate'] = $isDraft? "[approval date]": date('d M Y');//00 Jun 2020
        $info['applicantName'] = $sign->name;
        $info['designation'] = $sign->position;
        $info['coName'] = $appForm->co_name;
        $info['ssm'] = $appForm->ssm_no;
        $info['regAddr1'] = explode(',', $addr, 3)[0];
        $info['regAddr2'] = explode(',', $addr, 3)[1];
        $info['regAddr3'] = explode(',', $addr, 3)[2];
        $info['subDate'] = $subDate->format('d M Y');
        $info['expDate'] =$subDate->modify('+18 month')->format('d M Y');//submission date + 18 months
        $info['approvedPax'] = $appState->approved_pax;
        $info['approvedAmmt'] = $appState->approved_fund;
        $pdf = PDF::loadView('loaTemplate', [
            'info' => $info,
            ]);
        $filename= 'PENJANA_DIGITAL_LETTER_OF_AWARD'.($isDraft? '_DRAFT':'') .'.pdf';
        $content = $pdf->output();
        if(!is_dir(storage_path('files\\'.$appId))) mkdir(storage_path('files\\'.$appId));
        if(!is_dir(storage_path('files\\'.$appId.'\\letter'))) mkdir(storage_path('files\\'.$appId.'\\letter'));
        file_put_contents(
            storage_path('files\\'.$appId.'\\letter\\'.$filename), 
        $content);
        return $filename;
    }

    protected function generateRejectLetter($appId, $isDraft)
    {
        $info = [];
        $appForm = ApplicationForm::find($appId);
        $appState = ApplicationState::where('app_id', '=', $appId)->latest()->first(); 
        $firstState = ApplicationState::where('app_id', '=', $appId)->orderBy('id', 'asc')->first();
        $subDate = new DateTime($firstState->created_at);
        $sign = ApplicantSignInfo::where('app_id', '=', $appId)->first();
        $addr = $appForm->reg_addr;

        $info['refNo'] = $appForm->ref_no;
        $info['printDate'] = $isDraft? "[approval date]": date('d M Y');//00 Jun 2020
        $info['applicantName'] = $sign->name;
        $info['designation'] = $sign->position;
        $info['coName'] = $appForm->co_name;
        $info['ssm'] = $appForm->ssm_no;
        $info['regAddr1'] = explode(',', $addr, 3)[0];
        $info['regAddr2'] = explode(',', $addr, 3)[1];
        $info['regAddr3'] = explode(',', $addr, 3)[2];
        $info['subDate'] = $subDate->format('d M Y');
        $info['expDate'] =$subDate->modify('+18 month')->format('d M Y');//submission date + 18 months
        $info['approvedPax'] = $appState->approved_pax;
        $info['approvedAmmt'] = $appState->approved_fund;
        $pdf = PDF::loadView('rejectLetterTemplate', [
            'info' => $info,
            ]);
        $filename= 'REJECTLETTER'.($isDraft? '_DRAFT':'') .'.pdf';
        $content = $pdf->output();
        if(!is_dir(storage_path('files\\'.$appId))) mkdir(storage_path('files\\'.$appId));
        if(!is_dir(storage_path('files\\'.$appId.'\\letter'))) mkdir(storage_path('files\\'.$appId.'\\letter'));
        file_put_contents(
            storage_path('files\\'.$appId.'\\letter\\'.$filename), 
        $content);
        return $filename;
    }

    protected function getRoleRights($roleId, $target_role_id)
    {
        $dom = [];
        $dom['scorecardWrite'] = "0";
        $dom['fundingWrite'] = "0";
        $dom['showReject'] = "0";
        $dom['showApprove'] = "0";

        if($roleId == $target_role_id)
        {
            if(in_array($roleId, [config('enums.role')['SECL1'], config('enums.role')['SECL2']]))
            {
                $dom['scorecardWrite'] = "1";
            }

            if(in_array($roleId, 
            [config('enums.role')['SECL1'], 
            config('enums.role')['SECL2'],
            config('enums.role')['COMM']]))
            {
                $dom['fundingWrite'] = "1";
            }

            if($roleId ==  config('enums.role')['COMM'])
            {
                $dom['approveText'] = "Approve";
                $dom['rejectText'] = "Reject";
            }
            elseif($roleId == config('enums.role')['ENDORSE'])
            {
                $dom['approveText'] = "Endorse";
                $dom['rejectText'] = "";
            }else
            {
                $dom['approveText'] = "Recommend";
                $dom['rejectText'] = "Not Recommend";
            }

            if(! in_array($roleId, [config('enums.role')['ENDORSE'], config('enums.role')['VIEWER']]))
            {
                $dom['showReject'] = "1";
            }

            if($roleId != config('enums.role')['VIEWER'])
            {
                $dom['showApprove'] = "1";
            }

        }

        return $dom;
    }

    public function viewAppAudit($appId)
    {
        $result = ApplicationHistory::where('app_id','=',$appId)
            ->leftJoin('flow_states','application_histories.state_id' ,'=', 'flow_states.id')
            ->orderBy('application_histories.action_date', 'asc')
            ->select('application_histories.*','flow_States.name')
            ->get();
        

        $appForm = ApplicationForm::find($appId);
        return view('appDetailsAudit')->with([
            'appForm' => $appForm,
            'result' => $result
        ]);
    }

    protected function genRefNo($appId)
    {
        //Log::info('lenght of '.$appId.' is '. strlen($appId));
        return env('REF_PREFIX').(strlen($appId)<3? str_pad($appId, 4-(strlen($appId) ), "0", STR_PAD_LEFT): $appId);
    }
}