<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Applicant;
use App\ApplicantSignInfo;
use App\ApplicationForm;
use App\ApplicationStatus;
use App\EmailActivatorKey;
use App\ContactInfo;
use App\AssistInfo;
use App\PrequalifyCheck;
use App\Employee;
use App\Financial;
use App\RecruitPax;
use App\RecruitPlan;
use App\SupportDoc;
use App\Mail\ActivateAccount;
use Log;

class ApplicationController extends Controller
{
    public function viewAppSect($sctNo)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        $loadData = $this->loadSectionData($sctNo);
        //Log:info($loadData);
        return view('appFormSect'.$sctNo)->with([
            'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
            'activeSct' => $sctNo,
            'appForm' => $loadData['appForm'],
            'loadData' => $loadData,
          ]);
    }

    protected function loadSectionData($sctNo)
    {
        
        $viewData = [];
        $applicant = Applicant::find(session('userId'));
        $viewData['sect_progress'] = session('userSectProgress');
        
        switch($sctNo)
        {
            case 1:
                if(isset($applicant->app_id))
                {
                    $appForm = ApplicationForm::find($applicant->app_id);
                    $viewData['appForm'] = $appForm->toArray();
                    $viewData['act'] = 'edit';
                }
                else
                {
                    $appForm = new ApplicationForm;
                    $viewData['appForm'] = $appForm; 
                }
                
                $viewData['countries'] = $this->loadCountries(); 
            break;
            case 2:
                
                if(ContactInfo::where([['applicant_id', '=', $applicant->id]])->exists() ||
                AssistInfo::where([['applicant_id', '=', $applicant->id]])->exists() ||
                PrequalifyCheck::where([['applicant_id', '=', $applicant->id]])->exists() )
                {
                    $tempContacts = ContactInfo::where([['applicant_id', '=', $applicant->id]])->get()->toArray();
                    $contactInfo = [];
                    foreach($tempContacts as $tempContact){
                        $contactInfo[$tempContact['contact_type']] = 'Y';
                        if(isset($tempContact['comment']))
                        {
                            $contactInfo[$tempContact['contact_type'].'Comment'] = $tempContact['comment'];
                        }
                    }
                    $assistInfo = AssistInfo::where([['applicant_id', '=', $applicant->id]])->first()->toArray();
                    $pc = PrequalifyCheck::where([['applicant_id', '=', $applicant->id]])->first()->toArray();
                    $appForm = array_merge($contactInfo, $assistInfo, $pc);
                    //Log::info($appForm);
                    $viewData['appForm'] = $appForm;
                    $viewData['act'] = 'view';
                }
                else
                {
                    $appForm = [];
                    $appForm['id'] = $applicant->id;
                    $viewData['appForm'] = $appForm; 
                }
            break;
            case 3:
                if(Employee::where([['app_id', '=', $applicant->app_id]])->exists())
                {
                    $employees = Employee::where([['app_id', '=', $applicant->app_id]])->get();
                    $viewData['act'] = 'edit';
                    $emp=[];
                    foreach($employees as $employee)
                    {
                        if($employee->year == 1 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                            $emp['inputLocalYear1'] = $employee->pax_count;
                        elseif ($employee->year == 2 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                            $emp['inputLocalYear2'] = $employee->pax_count;
                        elseif ($employee->year == 3 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                            $emp['inputLocalYear3'] = $employee->pax_count;
                        elseif ($employee->year == 1 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                            $emp['inputForeignerYear1'] = $employee->pax_count;
                        elseif ($employee->year == 2 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                            $emp['inputForeignerYear2'] = $employee->pax_count;
                        elseif ($employee->year == 3 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                            $emp['inputForeignerYear3'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                            $emp['inputMalayEmp'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                            $emp['inputForeignEmp'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['MGMT'])
                            $emp['inputManagement'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['TECH'])
                            $emp['inputTechnical'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['SUPER'])
                            $emp['inputSupervisory'] = $employee->pax_count;
                        elseif ($employee->year == 0 && $employee->emp_type==config('enums.employeeType')['OTHERS'])
                            $emp['inputOthers'] = $employee->pax_count;
                    }
                    $emp['id'] = $applicant->app_id;
                    $viewData['appForm'] = $emp; 


                }
                else
                {
                    $appForm = new ApplicationForm;
                    $appForm['id'] = $applicant->app_id;
                    $viewData['appForm'] = $appForm; 
                }
            break;
            case 4:
                if(Financial::where([['app_id', '=', $applicant->app_id]])->exists())
                {
                    $financials = Financial::where([['app_id', '=', $applicant->app_id]])->get();
                    $viewData['act'] = 'edit';
                    $fin=[];
                    foreach($financials as $temp)
                    {
                        switch($temp->year)
                        {
                            case -1:
                                $fin['inputRevYear3'] = $temp->sales;
                                $fin['inputNetYear3'] = $temp->loss;
                                $fin['inputCapYear3'] = $temp->capital;
                                $fin['inputOpYear3'] = $temp->expenditure;
                            break;

                            case -2:
                                $fin['inputRevYear2'] = $temp->sales;
                                $fin['inputNetYear2'] = $temp->loss;
                                $fin['inputCapYear2'] = $temp->capital;
                                $fin['inputOpYear2'] = $temp->expenditure;
                            break;

                            case -3:
                                $fin['inputRevYear1'] = $temp->sales;
                                $fin['inputNetYear1'] = $temp->loss;
                                $fin['inputCapYear1'] = $temp->capital;
                                $fin['inputOpYear1'] = $temp->expenditure;
                            break;
                        }
                    }
                    
                    $fin['id'] = $applicant->app_id;
                    $viewData['appForm'] = $fin;

                }
                else
                {
                    $appForm = new ApplicationForm;
                    $appForm['id'] = $applicant->app_id;
                    $viewData['appForm'] = $appForm; 
                }
            break;
            case 5:
                $appForm = ApplicationForm::find($applicant->app_id);
                $temp['id'] = $applicant->app_id;
                $arrManufacturing = ['Green Technology','Medical Devices','Automotive','Additive Manufacturing','Aerospace'];
                $useFormula = "1";
                if ($appForm->industry_type=="SME" || in_array($appForm->sector, $arrManufacturing) )
                {
                    $useFormula = "0";
                }

                if(RecruitPax::where([['app_id', '=', $applicant->app_id]])->exists())
                {
                    $viewData['act'] = 'edit';
                    $recruit = [];
                    $recruitPax = RecruitPax::where([['app_id', '=', $applicant->app_id]])->get();
                    $recruitPlan = RecruitPlan::where([['app_id', '=', $applicant->app_id]])->get();
                    $tbl1 = [];
                    $tbl2 = [];
                    foreach($recruitPax as $row)
                    {
                        $tbl1['tbl1'][]=[
                            'inputPosition' => $row->position, 
                            'degree' => $row->qualification, 
                            'inputPax' => $row->pax_count,
                            'inputSalary' => $row->min_salary
                        ];
                    }

                    foreach($recruitPlan as $row)
                    {
                        $tbl2['tbl2'][]=[
                            'inputPosition2' => $row->position, 
                            'inputMonth1' => $row->month1, 
                            'inputMonth2' => $row->month2,
                            'inputMonth3' => $row->month3
                        ];
                    }

                    $recruit = array_merge($tbl1, $tbl2);
                    $recruit['id'] = $applicant->app_id;
                    $viewData['appForm'] = $recruit;

                }
                else
                {
                    $temp['useFormula'] = $useFormula;
                    $temp['tbl1'] = [];
                    $temp['tbl2'] = [];
                    $viewData['appForm'] = $temp; 
                }
            break;
            case 6:
                if(SupportDoc::where([['app_id', '=', $applicant->app_id]])->exists())
                {
                    $viewData['act'] = 'edit';
                    $docs = [];
                    $temp = SupportDoc::where([['app_id', '=', $applicant->app_id]])->get();
                    foreach($temp as $row)
                    {
                        $docs[$row->content_id] =  $row->original_filename;
                    }

                    //Log::info($docs);
                    $appForm['id'] = $applicant->app_id;
                    $viewData['appForm'] = $appForm; 
                    $viewData['docs'] = $docs; 
                }
                else
                {
                    $appForm = [];
                    $appForm['id'] = $applicant->app_id;
                    $viewData['appForm'] = $appForm; 
                }
            break;
            case 7:
                    $appForm = [];
                    $appForm['id'] = $applicant->app_id;
                    $viewData['appForm'] = $appForm; 
            break;

        }

        return $viewData;
    }

    protected function loadCountries()
    {
        $path = resource_path() . "/json/countries.json";
        return json_decode(file_get_contents($path), true);
    }

    protected function genRefNo($appId)
    {
        //str_pad($input, 10, "-=", STR_PAD_LEFT)
        if(strlen($appId)<4)
            $appId = str_pad($appId, 4-(strlen($appId) ), "0", STR_PAD_LEFT);
        return env('REF_PREFIX').date('Y').$appId;
    }

    public function viewAppStatus()
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        $applicant = Applicant::where([['id','=', session('userId')]])->first();
        $appStatus = ApplicationStatus::where([['app_id','=',$applicant->app_id]])
            ->orderBy('id', 'desc')->first(); 
        $appForm = ApplicationForm::where([['id','=',$applicant->app_id]])->first();
        Log::info($appStatus);
        $statusData = [];
        $statusData['refNo'] = $appForm->ref_no;
        $statusData['status'] = array_flip(config('enums.applicationStatus'))[$appStatus->status_id];
        $statusData['remark'] = $appStatus->comment;
        return view('appFormApplicationStatus')->with([
            'activeLink' => config('enums.applicantSidebarLinks')['APP_STATUS'],
            'appStatus' => $statusData
            ]);
    }

    public function sct1Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        $act = $request->act;
        if($act == 'edit')
        {
            $appForm = ApplicationForm::find($request->appId);
        }
        else
        {
            $appForm = new ApplicationForm;
        }
        
        $appForm->id = $request->appId;
        $appForm->co_name = $request->inputCompName;
        $appForm->incorporation_date = $request->inputIncorpDate;
        $appForm->ssm_no = $request->inputSSMno;
        $appForm->paid_capital = $request->inputCapital;
        $appForm->reg_addr = $request->inputRegAddress;
        $appForm->biz_addr = $request->inputBussinessAddress;
        $appForm->contact_no = $request->inputContactNumber;
        $appForm->designation = $request->inputDesignation;
        $appForm->email = $request->inputEmail;
        $appForm->fax = $request->inputFaxNumber;
        $appForm->website = $request->inputWebsite;
        $appForm->equity = $request->inputEqualty1;
        $appForm->parent_co = $request->inputHolding;
        $appForm->country = $request->selCountry;
        $appForm->industry_type = $request->selIndustry;
        $appForm->sector = trim($request->selSector);
        $act = $request->act;
        if($appForm->sector == "Others")
        {
            $appForm->sector .= ":".$request->inputOthers;
        }

        //Log::info($appForm->toArray());
        //validate input
        $errMsg=[];
        foreach($appForm->toArray() as $key => $value)
        {
            if(in_array($key, ['id']))
                continue;
            if(empty($value) || !isset($value))
            {
                $errMsg[$key] = "Please fill in mandatory fields!";
            }
        }

        if( !array_key_exists("email", $errMsg) && !filter_var($appForm->email, FILTER_VALIDATE_EMAIL))
        {
            $errMsg["email"] = "Email format is not correct!";
        } 
        if(!array_key_exists("website", $errMsg) &&
        !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$appForm->website))
        {
            $errMsg["website"] ="Invalid URL";
        }
        if($act != 'edit' && !array_key_exists("website", $errMsg) && ApplicationForm::where([['ssm_no', '=', $appForm->ssm_no]])->exists())
        {
            $errMsg["ssm_no"] ="This SSM Registration Number already existed in the system!";
        }

        //Log::info($errMsg);
        //Log::info($appForm);
        //end validation
        if(!empty($errMsg)){
            $loadData =[];
            $loadData['countries'] = $this->loadCountries(); 
            $loadData['sect_progress'] = session('userSectProgress');
            return view('appFormSect1')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 1,
                'appForm' => $appForm->toArray(),
                'loadData' => $loadData,
                'errMsg' => $errMsg,
              ]);;
            
        }
        else
        {
            //$appForm->status = config('enums.applicationStatus')['SAVED'];
            $appForm->save();

            $applicant = Applicant::find(session('userId'));
            $applicant->app_id = $appForm->id;
            if($applicant->sect_progress <= 1)
            {
                $applicant->sect_progress = 2;
                session(['userSectProgress' => 2]);
            }
            $applicant->app_id = $appForm->id;
            $applicant->save();

            return redirect('/formSct/2');
            
        }

    }

    public function sct2Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        //Log::info($request);
        $errMsg=[];
        $act = $request->act;
        $applicant = Applicant::find($request->applicantId);
        $assistInfo = new AssistInfo;
        $prequalifyCheck = new PrequalifyCheck;
        
        //no edit for sect2, one time save
        $keys =array_keys($request->toArray());
        $contacts = preg_grep("/^chk/", $keys);
        //Log::info($contacts);
        if(empty($contacts))
        {
            $errMsg["contact"] ="Please tick one of the options below!";
        }

        $assistInfo->applicant_id = $request->applicantId;
        $assistInfo->is_involved = $request->rdoIsInvolved;
        $assistInfo->financial_assisted = $request->rdoFinancialAssisted;
        $assistInfo->ipa_incentives = $request->rdoIpaIncentives;
        $assistInfo->tws_assisted = $request->rdoTwsAssisted;

        $prequalifyCheck->applicant_id = $request->applicantId;
        $prequalifyCheck->illegal_lawsuit = $request->rdoIllegalLawsuit;
        $prequalifyCheck->false_Declare = $request->rdoFalseDeclare;
        $prequalifyCheck->fraud_case = $request->rdoFraud;
        $prequalifyCheck->audit_opinion = $request->rdoAudit;
        

        //Log::info($appForm->toArray());
        //validate input
        
        foreach($assistInfo->toArray() as $key => $value)
        {
            if(in_array($key, ['id','applicant_id']))
                continue;
            if(!isset($value))
            {
                $errMsg[$key] = "Please tick one!";
            }
        }

        foreach($prequalifyCheck->toArray() as $key => $value)
        {
            if(in_array($key, ['id','applicant_id']))
                continue;
            if(!isset($value))
            {
                $errMsg[$key] = "Please tick one!";
            }
        }

        if(!empty($errMsg)){
            $loadData =[];
            $appForm =[];
            $contactInfo = [];
            $loadData['sect_progress'] = session('userSectProgress');
            foreach($contacts as $key){
                $contactInfo[$request->$key] = 'Y';
                $commentKey = "input".substr($key,3);
                Log::info("comment key: ".$commentKey );
                if(isset($request->$commentKey))
                {
                    $contactInfo[($request->$key).'Comment'] = $request->$commentKey;
                }
            }

            $appForm = array_merge($contactInfo, $assistInfo->toArray(), $prequalifyCheck->toArray());
            $appForm['id'] = $applicant->id;
            //Log::info($appForm);
            return view('appFormSect2')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 2,
                'appForm' => $appForm,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
              ]);;
            
        }
        else
        {//save data
            foreach($contacts as $key)
            {
                $contact = new ContactInfo;
                $commentKey = "input".substr($key,3);
                $contact->applicant_id = $request->applicantId;
                $contact->contact_type = $request->$key;
                $contact->comment = $request->$commentKey;
                $contact->save();
            }

            $assistInfo->save(); 
            $prequalifyCheck->save();

            //check success or fail prequalify
            $passCheck = true;
            Log::info($prequalifyCheck);
            //use toArray because need to get just the properties I set, not all
            foreach($prequalifyCheck->toArray() as $key => $v)
            {
                if(in_array($key, ['id','applicant_id']))
                    continue;
                if($v=='1')
                {
                    Log::info("hit invalid check! key: ".$key." value: ".$v );
                    $passCheck = false;
                    break;
                }

            }
            if($passCheck)
            {//pass
                $applicant = Applicant::find(session('userId'));
                
                if($applicant->sect_progress <= 2)
                {
                    $applicant->sect_progress = 3;
                    session(['userSectProgress' => 3]);
                }
                $applicant->save();
                return redirect('/formSct/3');
            }
            else
            {
                $appStatus = new ApplicationStatus;
                $appStatus->app_id = $applicant->app_id;
                $appStatus->status_id = config('enums.applicationStatus')['PREQ_FAILED'];
                $appStatus->comment = "Failed prequalification check.";
                $appStatus->save();

                $appForm = ApplicationForm::where([['id', '=', $applicant->app_id]]);
                $appForm->ref_no = $this->genRefNo($applicant->app_id);
                $appForm->save();

                //TODO redirect to application status page
                //return redirect('/formSct/3');
            }

            

        }
    }

    public function sct3Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        //Log::info($request);
        $errMsg=[];
        $req=[];
        $act = $request->act;
        $appForm = ApplicationForm::find($request->appId);
        

        $req['inputLocalYear1'] = $request->inputLocalYear1;
        $req['inputLocalYear2'] = $request->inputLocalYear2;
        $req['inputLocalYear3'] = $request->inputLocalYear3;
        $req['inputForeignerYear1'] = $request->inputForeignerYear1;
        $req['inputForeignerYear2'] = $request->inputForeignerYear2;
        $req['inputForeignerYear3'] = $request->inputForeignerYear3;
        $req['inputMalayEmp'] = $request->inputMalayEmp;
        $req['inputForeignEmp'] = $request->inputForeignEmp;
        $req['inputManagement'] = $request->inputManagement;
        $req['inputTechnical'] = $request->inputTechnical;
        $req['inputSupervisory'] = $request->inputSupervisory;
        $req['inputOthers'] = $request->inputOthers;

        //validation
        foreach($req as $key => $value)
        {
            if(!isset($value))
            {
                $errMsg[$key] = "Please fill in mandatory fields!";
            }
        }
        if(empty($errMsg))
        {//check calculation
            if(($req['inputMalayEmp']+$req['inputForeignEmp']) != 
            ($req['inputManagement']+$req['inputTechnical']+
            $req['inputSupervisory']+$req['inputOthers']))
            {
                $errMsg['total'] ="Total Not match! a+b=".($req['inputMalayEmp']+$req['inputForeignEmp']).
                " but c+d+e+f=".($req['inputManagement']+$req['inputTechnical']+
                $req['inputSupervisory']+$req['inputOthers']);
            }
        }

        if(!empty($errMsg)){
            $req['id']=$request->appId;
            $loadData =[];
            $loadData['sect_progress'] = session('userSectProgress');
            return view('appFormSect3')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 3,
                'appForm' => $req,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
            ]);;
            
        }
        else
        {
            if($act == 'edit')
            {
                Employee::where([['app_id', '=', $appForm->id],['year','=', 1],['emp_type', '=',config('enums.employeeType')['LOCAL']]])
                ->update(['pax_count'=> $req['inputLocalYear1']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 2],['emp_type', '=',config('enums.employeeType')['LOCAL']]])
                ->update(['pax_count'=> $req['inputLocalYear2']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 3],['emp_type', '=',config('enums.employeeType')['LOCAL']]])
                ->update(['pax_count'=> $req['inputLocalYear3']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 1],['emp_type', '=',config('enums.employeeType')['FOREIGNER']]])
                ->update(['pax_count'=> $req['inputForeignerYear1']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 2],['emp_type', '=',config('enums.employeeType')['FOREIGNER']]])
                ->update(['pax_count'=> $req['inputForeignerYear2']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 3],['emp_type', '=',config('enums.employeeType')['FOREIGNER']]])
                ->update(['pax_count'=> $req['inputForeignerYear3']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['LOCAL']]])
                ->update(['pax_count'=> $req['inputMalayEmp']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['FOREIGNER']]])
                ->update(['pax_count'=> $req['inputForeignEmp']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['MGMT']]])
                ->update(['pax_count'=> $req['inputManagement']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['TECH']]])
                ->update(['pax_count'=> $req['inputTechnical']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['SUPER']]])
                ->update(['pax_count'=> $req['inputSupervisory']]);

                Employee::where([['app_id', '=', $appForm->id],['year','=', 0],['emp_type', '=',config('enums.employeeType')['OTHERS']]])
                ->update(['pax_count'=> $req['inputOthers']]);
            }
            else
            {
                //forecast
                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['LOCAL'];
                $employee->year = 1;
                $employee->pax_count = $req['inputLocalYear1'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['LOCAL'];
                $employee->year = 2;
                $employee->pax_count = $req['inputLocalYear2'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['LOCAL'];
                $employee->year = 3;
                $employee->pax_count = $req['inputLocalYear3'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['FOREIGNER'];
                $employee->year = 1;
                $employee->pax_count = $req['inputForeignerYear1'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['FOREIGNER'];
                $employee->year = 2;
                $employee->pax_count = $req['inputForeignerYear2'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['FOREIGNER'];
                $employee->year = 3;
                $employee->pax_count = $req['inputForeignerYear3'];
                $employee->save();

                //current employee
                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['LOCAL'];
                $employee->year = 0;
                $employee->pax_count = $req['inputMalayEmp'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['FOREIGNER'];
                $employee->year = 0;
                $employee->pax_count = $req['inputForeignEmp'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['MGMT'];
                $employee->year = 0;
                $employee->pax_count = $req['inputManagement'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['TECH'];
                $employee->year = 0;
                $employee->pax_count = $req['inputTechnical'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['SUPER'];
                $employee->year = 0;
                $employee->pax_count = $req['inputSupervisory'];
                $employee->save();

                $employee = new Employee;
                $employee->app_id = $appForm->id;
                $employee->emp_type = config('enums.employeeType')['OTHERS'];
                $employee->year = 0;
                $employee->pax_count = $req['inputOthers'];
                $employee->save();

            }

            $applicant = Applicant::find(session('userId'));
                
            if($applicant->sect_progress <= 3)
            {
                $applicant->sect_progress = 4;
                session(['userSectProgress' => 4]);
            }
            $applicant->save();
            return redirect('/formSct/4');
        }

    }

    public function sct4Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        $errMsg=[];
        $req=[];
        $act = $request->act;
        $appForm = ApplicationForm::find($request->appId);

        $req['inputRevYear1'] = $request->inputRevYear1;
        $req['inputRevYear2'] = $request->inputRevYear2;
        $req['inputRevYear3'] = $request->inputRevYear3;
        $req['inputNetYear1'] = $request->inputNetYear1;
        $req['inputNetYear2'] = $request->inputNetYear2;
        $req['inputNetYear3'] = $request->inputNetYear3;
        $req['inputCapYear1'] = $request->inputCapYear1;
        $req['inputCapYear2'] = $request->inputCapYear2;
        $req['inputCapYear3'] = $request->inputCapYear3;
        $req['inputOpYear1'] = $request->inputOpYear1;
        $req['inputOpYear2'] = $request->inputOpYear2;
        $req['inputOpYear3'] = $request->inputOpYear3;

        //validation
        foreach($req as $key => $value)
        {
            if(!isset($value))
            {
                $errMsg[$key] = "Please fill in mandatory fields!";
            }
        }

        if(!empty($errMsg)){
            $loadData =[];
            $loadData['sect_progress'] = session('userSectProgress');
            return view('appFormSect4')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 4,
                'appForm' => $req,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
            ]);;
            
        }
        else
        {
            if($act == 'edit')
            {
                Financial::where([['app_id', '=', $appForm->id],['year','=', -3]])
                ->update([
                    'sales'=> $req['inputRevYear1'],
                    'loss'=> $req['inputNetYear1'],
                    'capital'=> $req['inputCapYear1'],
                    'expenditure'=> $req['inputOpYear1'],
                ]);

                Financial::where([['app_id', '=', $appForm->id],['year','=', -2]])
                ->update([
                    'sales'=> $req['inputRevYear2'],
                    'loss'=> $req['inputNetYear2'],
                    'capital'=> $req['inputCapYear2'],
                    'expenditure'=> $req['inputOpYear2'],
                ]);

                Financial::where([['app_id', '=', $appForm->id],['year','=', -1]])
                ->update([
                    'sales'=> $req['inputRevYear3'],
                    'loss'=> $req['inputNetYear3'],
                    'capital'=> $req['inputCapYear3'],
                    'expenditure'=> $req['inputOpYear3'],
                ]);

            }
            else
            {
                $fin = new Financial;
                $fin->app_id = $appForm->id;
                $fin->year = -3;
                $fin->sales = $req['inputRevYear1'];
                $fin->loss = $req['inputNetYear1'];
                $fin->capital = $req['inputCapYear1'];
                $fin->expenditure = $req['inputOpYear1'];
                $fin->save();

                $fin = new Financial;
                $fin->app_id = $appForm->id;
                $fin->year = -2;
                $fin->sales = $req['inputRevYear2'];
                $fin->loss = $req['inputNetYear2'];
                $fin->capital = $req['inputCapYear2'];
                $fin->expenditure = $req['inputOpYear2'];
                $fin->save();

                $fin = new Financial;
                $fin->app_id = $appForm->id;
                $fin->year = -1;
                $fin->sales = $req['inputRevYear3'];
                $fin->loss = $req['inputNetYear3'];
                $fin->capital = $req['inputCapYear3'];
                $fin->expenditure = $req['inputOpYear3'];
                $fin->save();

            }

            $applicant = Applicant::find(session('userId'));
            if($applicant->sect_progress <= 4)
            {
                $applicant->sect_progress = 5;
                session(['userSectProgress' => 5]);
            }
            $applicant->save();
            return redirect('/formSct/5');
        }
    }

    public function sct5Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        //Log::info($request);
        $errMsg=[];
        $req=[];
        $act = $request->act;
        //$appForm = ApplicationForm::find($request->appId);

        $inputPosition = $request->inputPosition;
        $degree = $request->degree;
        $inputPax = $request->inputPax;
        $inputSalary = $request->inputSalary;
        $tbl1=[];
        for($i = 0; $i < count($inputPosition); $i++)
        {
            if(!isset($inputPosition[$i]) || !isset($inputPax[$i])  || !isset($inputSalary[$i]) )
            {
                $errMsg['tbl1'] = "Please fill in all fields inside the table!";
            }
            $tbl1['tbl1'][]=[
                'inputPosition' => $inputPosition[$i], 
                'degree' => $degree[$i], 
                'inputPax' => $inputPax[$i],
                'inputSalary' => $inputSalary[$i]
            ];
        }
        
        $inputPosition2 = $request->inputPosition2;
        $inputMonth1 = $request->inputMonth1;
        $inputMonth2 = $request->inputMonth2;
        $inputMonth3 = $request->inputMonth3;
        $tbl2=[];
        for($i = 0; $i < count($inputPosition2); $i++)
        {
            if(!isset($inputPosition2[$i]) || !isset($inputMonth1[$i])  || !isset($inputMonth2[$i]) || !isset($inputMonth3[$i]))
            {
                $errMsg['tbl2'] = "Please fill in all fields inside the table!";
            }

            $tbl2['tbl2'][]=[
                'inputPosition2' => $inputPosition2[$i], 
                'inputMonth1' => $inputMonth1[$i], 
                'inputMonth2' => $inputMonth2[$i],
                'inputMonth3' => $inputMonth3[$i]
            ];
        }
        

        if(empty($errMsg))
        {//check count match between table 1 and table 2
            if($request->totalpax < 5 || $request->totalpax > 50)
            {
                $errMsg['tbl1'] = "There must be a mininum 5 participants and a maximun of 50 participants!";
            }
            elseif($request->totalpax != $request->totalpax2)
            {
                $msg = "Total count is not tally! Please adjust your participants!";
                $errMsg['tbl1'] = $msg;
                $errMsg['tbl2'] = $msg;
            }
            else
            {
                $intallyPos = [];
                foreach($inputPosition as $key => $pos)
                {
                    if(in_array($pos, $inputPosition2))
                    {//check count for position
                        $key2 = array_flip($inputPosition2)[$pos];
                        if($inputPax[$key] != ($inputMonth1[$key2] + $inputMonth2[$key2] + $inputMonth3[$key2]))
                        {
                            $intallyPos[] = $pos;
                        }
                    }
                    else
                    {//position not found
                        $intallyPos[] = $pos;
                    }
                    
                }
                if(!empty($intallyPos))
                {
                    $errMsg['tbl1'] = 
                    "Participant count not tally for position(s): ". join(", ", $intallyPos)."!";
                }
            }
        }

        if(!empty($errMsg))
        {
            $loadData =[];
            $req = array_merge($tbl1,$tbl2);
            $req['id'] = $request->appId;
            //Log::info($req);
            $loadData['sect_progress'] = session('userSectProgress');
            return view('appFormSect5')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 5,
                'appForm' => $req,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
            ]);;
        }
        else
        {   
            //Log::info($tbl1);
            //Log::info($tbl2);
            //tbl1
            if(RecruitPax::where([['app_id', '=', $request->appId]])->exists())
            {
                RecruitPax::where([['app_id', '=', $request->appId]])->delete();
            }
            
            foreach($tbl1['tbl1'] as $row)
            {

                $recruitPax = new RecruitPax;
                $recruitPax->app_id = $request->appId;
                $recruitPax->position = $row['inputPosition'];
                $recruitPax->qualification = $row['degree'];
                $recruitPax->min_salary = $row['inputSalary'];
                $recruitPax->pax_count = $row['inputPax'];
                $recruitPax->save();
            }

            //tbl2
            if(RecruitPlan::where([['app_id', '=', $request->appId]])->exists())
            {
                RecruitPlan::where([['app_id', '=', $request->appId]])->delete();
            }

            foreach($tbl2['tbl2'] as $row)
            {
                $recruitPlan = new RecruitPlan;
                $recruitPlan->app_id = $request->appId;
                $recruitPlan->position = $row['inputPosition2'];
                $recruitPlan->month1 = $row['inputMonth1'];
                $recruitPlan->month2 = $row['inputMonth2'];
                $recruitPlan->month3 = $row['inputMonth3'];
                $recruitPlan->save();
            }

            $applicant = Applicant::find(session('userId'));
            if($applicant->sect_progress <= 5)
            {
                $applicant->sect_progress = 6;
                session(['userSectProgress' => 6]);
            }
            $applicant->save();
            return redirect('/formSct/6');
        }
    }

    public function sct6Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }

        $errMsg=[];
        $reqFiles=[];
        $act = $request->act;
        $imgExtension = ['jpg','jpeg','png', 'gif','pdf'];
        for($i=1; $i <= count(config('enums.fileContentType')); $i++)
        {
            if($request->hasfile('customFile-'.$i))
            {
                if(in_array(strtolower($request->file('customFile-'.$i)->getClientOriginalExtension()), $imgExtension))
                {
                    $reqFiles[$i] = $request->file('customFile-'.$i);
                }
                else
                {
                    $errMsg['err-'.$i] = "File extension allowed:".join("," ,$imgExtension);
                }
                
            }
            elseif($act != 'edit')
            {
                $errMsg['err-'.$i] = "No file selected!";
            }
        }
        //Log::info($reqFiles);
        if(!empty($errMsg))
        {
            $loadData =[];
            $loadData['act'] = $act;
            $reqFiles['id'] = $request->appId;
            //Log::info($req);
            $loadData['sect_progress'] = session('userSectProgress');
            if($act=='edit')
            {
                $docs = [];
                $temp = SupportDoc::where([['app_id', '=', $request->appId]])->get();
                Log::info($temp);
                foreach($temp as $row)
                {
                    $docs[$row->content_id] =  $row->original_filename;
                }

                $loadData['docs'] = $docs; 
            }
            //Log::info($loadData);
            return view('appFormSect6')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 6,
                'appForm' => $reqFiles,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
            ]);;
        }
        else
        {
            if($act != 'edit')
            {
                for($i=1; $i <= count(config('enums.fileContentType')); $i++)
                {
                    $file = $reqFiles[$i];
                    $name = $file->getClientOriginalName();
                    $genName = date('YmdHisv')."_".$request->appId."_".$i.".".$file->getClientOriginalExtension();
                    $file->move(storage_path().'/supportDoc/'.$request->appId.'/',$genName); 
                    
                    $supportDoc = new SupportDoc;
                    $supportDoc->app_id = $request->appId;
                    $supportDoc->content_id = $i;
                    $supportDoc->original_filename = $name;
                    $supportDoc->new_filename = $genName;
                    $supportDoc->save();

                }

                $applicant = Applicant::find(session('userId'));
                if($applicant->sect_progress <= 6)
                {
                    $applicant->sect_progress = 7;
                    session(['userSectProgress' => 7]);
                }
                $applicant->save();
                return redirect('/formSct/7');
            }
            else
            {
                $applicant = Applicant::find(session('userId'));
                foreach($reqFiles as $key => $file)
                {
                    $supportDoc = SupportDoc::where([
                        ['app_id', '=', $applicant->app_id],
                        ['content_id', '=', $key],
                    ])->first();
                    $supportDoc->original_filename = $file->getClientOriginalName();
                    $supportDoc->save();

                    $file->move(storage_path().'/supportDoc/'.$request->appId.'/',$supportDoc->new_filename);                     
                }
                return redirect('/formSct/7');
            }
        }

    }

    public function sct7Save(Request $request)
    {
        if (!session('userName')) 
        {
            return redirect('/timeout');
        }
        $errMsg=[];

        $signInfo = new ApplicantSignInfo;
        $signInfo->app_id = $request->appId;
        $signInfo->name = $request->inputSignName;
        $signInfo->position = $request->inputSignPosition;
        $signInfo->date = $request->inputSignDate;
        $signInfo->contact_no = $request->inputSignContact;
        $signInfo->email = $request->inputSignEmail;
        $signInfo->ic_no = $request->inputSignIc;
        $chkTnc = $request->chkTnc;
        $inputPass = $request->inputPassword;

        //validation
        Log::Info($signInfo->toArray());
        foreach($signInfo->toArray() as $key => $value)
        {
            if(in_array($key, ['id','date','app_id']))
                continue;
            if(empty($value) || !isset($value))
            {
                $errMsg[$key] = "Please fill in mandatory fields!";
            }

        }

        if(empty($chkTnc))
        {
            $errMsg['chkTnc'] = "Please check to agree!";
        }
        if(empty($inputPass))
        {
            $errMsg['inputPassword'] = "Please enter your password!";
        }
        //2nd validation
        if( !array_key_exists("email", $errMsg) && !filter_var($signInfo->email, FILTER_VALIDATE_EMAIL))
        {
            $errMsg["email"] = "Email format is not correct!";
        } 
        if(!array_key_exists("inputPassword", $errMsg) && !Applicant::where([['password', '=', md5($inputPass)],['id', '=', session('userId')]])->exists())
        {
            $errMsg["inputPassword"] = "Password is incorrect!";
        }
        if(!empty($errMsg))
        {
            Log::Info($errMsg);
            $signData = [];
            $loadData =[];
            $signData['id'] = $request->appId;
            $signData['inputSignName'] = $request->inputSignName;
            $signData['inputSignPosition'] = $request->inputSignPosition;
            $signData['inputSignDate'] = $request->inputSignDate;
            $signData['inputSignContact'] = $request->inputSignContact;
            $signData['inputSignEmail'] = $request->inputSignEmail;
            $signData['inputSignIc'] = $request->inputSignIc;
            $loadData['sect_progress'] = session('userSectProgress');
            return view('appFormSect7')->with([
                'activeLink' => config('enums.applicantSidebarLinks')['FORM'],
                'activeSct' => 7,
                'appForm' => $signData,
                'loadData' => $loadData,
                'errMsg' => $errMsg,
            ]);
        }
        else
        {
            $signInfo->save();
            $appStatus = new ApplicationStatus;
            $appStatus->app_id = $request->appId;
            $appStatus->status_id = config('enums.applicationStatus')['SUBMITTED'];
            $appStatus->comment = "Application Submitted.";
            $appStatus->save();

            $appForm = ApplicationForm::where([['id', '=', $request->appId]])->first();
            $appForm->ref_no = $this->genRefNo($request->appId);
            $appForm->save();

            return redirect('/appStatus');
        }
        
    }
}