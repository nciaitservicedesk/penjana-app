<?php

namespace App\Traits;

use App\Applicant;
use App\ApplicantSignInfo;
use App\ApplicationForm;
use App\ApplicationStatus;
use App\ContactInfo;
use App\AssistInfo;
use App\PrequalifyCheck;
use App\Employee;
use App\Financial;
use App\RecruitPax;
use App\RecruitPlan;
use App\SupportDoc;

trait FormPreviewTrait {
  

    protected function getFullPreviewByAppicant($applicantId)
    {
        $applicant = Applicant::find($applicantId);
        $appForm = ApplicationForm::find($applicant->app_id);

        return $this->getFullPreview($appForm, $applicant);
        
    }

    protected function getFullPreviewByAppId($appId)
    {
        $appForm = ApplicationForm::find($appId);
        $applicant = Applicant::where('app_id' , '=', $appForm->id)->first();

        return $this->getFullPreview($appForm, $applicant);
    }

    private function getFullPreview($appForm, $applicant)
    {
        $previewData=[];
        //sect 1
        //$appForm = ApplicationForm::find($appId);
        
        $previewData['sect1'] = $appForm->toArray();

        //sect 2
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
        $sect2 = array_merge($contactInfo, $assistInfo, $pc);
        $previewData['sect2'] = $sect2;

        //sect 3
        $employees = Employee::where([['app_id', '=', $applicant->app_id]])->get();
        $emp=[];
        foreach($employees as $employee)
        {
            if($employee->year == 1 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                $emp['inputLocalYear1'] = $employee->pax_count;
            elseif ($employee->year == 2 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                $emp['inputLocalYear2'] = $employee->pax_count;
            elseif ($employee->year == 3 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                $emp['inputLocalYear3'] = $employee->pax_count;
            elseif ($employee->year == 4 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                $emp['inputLocalYear4'] = $employee->pax_count;
            elseif ($employee->year == 5 && $employee->emp_type==config('enums.employeeType')['LOCAL'])
                $emp['inputLocalYear5'] = $employee->pax_count;
            elseif ($employee->year == 1 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                $emp['inputForeignerYear1'] = $employee->pax_count;
            elseif ($employee->year == 2 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                $emp['inputForeignerYear2'] = $employee->pax_count;
            elseif ($employee->year == 3 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                $emp['inputForeignerYear3'] = $employee->pax_count;
            elseif ($employee->year == 4 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                $emp['inputForeignerYear4'] = $employee->pax_count;
            elseif ($employee->year == 5 && $employee->emp_type==config('enums.employeeType')['FOREIGNER'])
                $emp['inputForeignerYear5'] = $employee->pax_count;
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
        $previewData['sect3'] = $emp;

        //sect 4
        $financials = Financial::where([['app_id', '=', $applicant->app_id]])->get();
        $fin=[];
        foreach($financials as $temp)
        {
            switch($temp->year)
            {
                case -1:
                    $fin['inputRevYear5'] = $temp->sales;
                    $fin['inputNetYear5'] = $temp->loss;
                    $fin['inputCapYear5'] = $temp->capital;
                    $fin['inputOpYear5'] = $temp->expenditure;
                break;

                case -2:
                    $fin['inputRevYear4'] = $temp->sales;
                    $fin['inputNetYear4'] = $temp->loss;
                    $fin['inputCapYear4'] = $temp->capital;
                    $fin['inputOpYear4'] = $temp->expenditure;
                break;

                case -3:
                    $fin['inputRevYear3'] = $temp->sales;
                    $fin['inputNetYear3'] = $temp->loss;
                    $fin['inputCapYear3'] = $temp->capital;
                    $fin['inputOpYear3'] = $temp->expenditure;
                break;
                case -4:
                    $fin['inputRevYear2'] = $temp->sales;
                    $fin['inputNetYear2'] = $temp->loss;
                    $fin['inputCapYear2'] = $temp->capital;
                    $fin['inputOpYear2'] = $temp->expenditure;
                break;
                case -5:
                    $fin['inputRevYear1'] = $temp->sales;
                    $fin['inputNetYear1'] = $temp->loss;
                    $fin['inputCapYear1'] = $temp->capital;
                    $fin['inputOpYear1'] = $temp->expenditure;
                break;
            }
        }
        $previewData['sect4'] = $fin;

        //sect 5
        $arrManufacturing = ['Green Technology','Medical Devices','Automotive','Additive Manufacturing','Aerospace'];
        $useFormula = "1";
        if ($appForm->industry_type=="SME" || in_array($appForm->sector, $arrManufacturing) )
        {
            $useFormula = "0";
        }
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
        $recruit['useFormula'] = $useFormula;
        $previewData['sect5'] = $recruit;

        //sect 6
        $docs = [];
        $temp = SupportDoc::where([['app_id', '=', $applicant->app_id]])->get();
        foreach($temp as $row)
        {
            $docs[$row->content_id] =  $row->original_filename;
        }
        $previewData['sect6']['docs'] = $docs; 


        return $previewData;
    }
  
}