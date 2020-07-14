<section class="content">
  <!-- Application Status tittle--> 
<h5 class="mt-4 mb-2"></h5>
  <div class="card-body">

    <table class="table table-bordered" >
      <thead class="thead-dark">
        <tr>
          <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 1 COMPANY PROFILE</h4></th>
        </tr>
      </thead>
    </table>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
    </div>

    <!-- Company Name -->
    
    <div class="form-group row">
    <label for="inputCompName" class="col-sm-3 col-form-label">Company Name/ Applicant</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputCompName" name="inputCompName" value="{{ $previewData['sect1']['co_name'] ?? '' }}" readonly="readonly">
    </div>
    </div>
    
    <!-- Incorporation Date -->
    <div class="form-group row">
    <label for="inputIncorpDate" class="col-sm-3 col-form-label">Incorporation Date</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" id="inputIncorpDate" name="inputIncorpDate"  value="{{ $previewData['sect1']['incorporation_date'] ?? '' }}" readonly="readonly">    
    </div>
    </div>

    <!-- SSMNumber -->
    <div class="form-group row">
    <label for="inputSSMno" class="col-sm-3 col-form-label">SSM Registration Number</label>
    <div class="col-sm-9">
    <input type="text" class="form-control" id="inputSSMno" name="inputSSMno" 
    placeholder="SSM Registration Number" value="{{ $previewData['sect1']['ssm_no'] ?? '' }}" readonly="readonly">
    </div>
    </div>

    <!-- PaidUp -->
    <div class="form-group row">
    <label for="inputCapital" class="col-sm-3 col-form-label">Paid-up Capital (RM)</label>
    <div class="col-sm-9">
    <input type="number" class="form-control" id="inputCapital" name="inputCapital" value="{{ $previewData['sect1']['paid_capital'] ?? '' }}"
    placeholder="Paid-up Capital (RM)" step=".01" readonly="readonly">
    </div>
    </div>
  
    <!-- RegAddress -->
    <div class="form-group row">
    <label for="inputRegAddress" class="col-sm-3 col-form-label">Registered Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputRegAddress" value="{{ $previewData['sect1']['reg_addr'] ?? '' }}"
      name="inputRegAddress" placeholder="Registered Address" readonly="readonly">
    </div>
    </div>
  
  <!-- BussinessAddress -->
  <div class="form-group row">
  <label for="inputBussinessAddress" class="col-sm-3 col-form-label">Business Address</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputBussinessAddress" name="inputBussinessAddress" 
    value="{{ $previewData['sect1']['biz_addr'] ?? '' }}" placeholder="Business Address" readonly="readonly">
  </div>
  </div>
  
  <!-- ContactNumber &  Designation -->
  <div class="form-group row">
  <label for="inputContactNumber" class="col-sm-3 col-form-label">Contact Person Number</label>
  <div class="col-sm-3">
    <input type="number" class="form-control" value="{{ $previewData['sect1']['contact_no'] ?? '' }}"
    id="inputContactNumber" name="inputContactNumber" placeholder="Contact Person Number" readonly="readonly">
  </div>
  <div class="col-sm-1">
  </div>
  <label for="inputDesignation" class="col-sm-2 col-form-label">Designation</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputDesignation" name="inputDesignation" 
    value="{{ $previewData['sect1']['designation'] ?? '' }}" placeholder="Designation" readonly="readonly">
  </div>
  </div>
  
  <!-- Email &  FaxNumber -->  
  <div class="form-group row">
  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputEmail" name="inputEmail" 
    value="{{ $previewData['sect1']['email'] ?? '' }}" placeholder="Email" readonly="readonly">
  </div>
  <div class="col-sm-1">
  </div>
  <label for="inputFaxNumber" class="col-sm-2 col-form-label">Fax.No</label>
  <div class="col-sm-3">
    <input type="number" class="form-control" id="inputFaxNumber" name="inputFaxNumber" 
    value="{{ $previewData['sect1']['fax'] ?? '' }}" placeholder="Fax.No" readonly="readonly">
  </div>
  </div>
  
  <!-- Website --> 
  <div class="form-group row">
  <label for="inputWebsite" class="col-sm-3 col-form-label">Website</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputWebsite" name="inputWebsite" 
    value="{{ $previewData['sect1']['website'] ?? '' }}" placeholder="Website" readonly="readonly">
  </div>
  </div>
  
  <!-- Equalty --> 
  <div class="row">
    <label for="inputEqualty1" class="col-sm-4"></label>
    <div class="col-sm-3">
      <div class="input-group mb-3">
      Malaysian
      </div>
    </div>
    <div class="col-sm-3">
      <div class="input-group mb-3">
      Foreigner
      </div>
    </div>
  </div>
  <div class="form-group row">
  <label for="inputEqualty1" class="col-sm-3 col-form-label">Equalty Participation</label>
  <div class="col-sm-3">
    <div class="input-group mb-3">
      
      <input type="number" class="form-control" id="Equalty1" name="inputEqualty1" 
      value="{{ $previewData['sect1']['equity'] ?? '' }}" placeholder="Malaysian" max="100" readonly="readonly">
      <div class="input-group-prepend">
        <span class="input-group-text">%</span>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="input-group mb-3"> 
      <input type="number" class="form-control" id="Equalty2" 
      value="{{ $previewData['sect1']['equity'] ?(100 -$previewData['sect1']['equity']) :'' }}"
      placeholder="Foreign" max="100" readonly="readonly">
      <div class="input-group-prepend">
        <span class="input-group-text">%</span>
      </div>
    </div>
  </div>
  </div>
  
  <!-- Holding -->
  <div class="form-group row">
  <label for="inputHolding" class="col-sm-3">Name of Ultimate Holding/ Parent Company</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputHolding" name="inputHolding" 
    value="{{ $previewData['sect1']['parent_co'] ?? '' }}" placeholder="Name of Ultimate Holding/ Parent Company" readonly="readonly">
  </div>
  </div>
  
  <!-- Country of Origin -->
  <div class="form-group row">
  <label for="selCountry" class="col-sm-3 col-form-label">Country of Origin</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputHolding" name="inputHolding" 
    value="{{ $previewData['sect1']['country'] ?? '' }}" readonly="readonly">
  </div>
  </div>
  
  <!-- Type of Industry -->
  <div class="form-group row">
  <label for="selIndustry" class="col-sm-3 col-form-label">Type of Industry</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputHolding" name="inputHolding" 
    value="{{ $previewData['sect1']['industry_type'] ?? '' }}" readonly="readonly">
  </div>
  </div>


  <!-- SECTOR/ SUB-SECTOR -->
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">SECTOR/ SUB-SECTOR</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputHolding" name="inputHolding" 
      value="{{ $previewData['sect1']['sector'] ?? '' }}" readonly="readonly">
    </div>
  </div>

  <!-- Section 2 -->
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 2 PRE-QUALIFICATION CRITERIA</h4></th>
      </tr>
    </thead>
  </table>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>

  <!-- Part A -->
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">PART A</label>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label"> </label>
    <div class="col-sm-10">
      <div class="form-group">

        <div class="form-group row">
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkWebsite" name="chkWebsite" value="NCIA Website"
              @isset($previewData['sect2']['NCIA Website'])
              checked
              @endisset onclick="return false;" disabled>
              
              <label for="chkWebsite" class="custom-control-label">NCIA Website</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkSocial" name="chkSocial" value="NCIA Social Media"
              @isset($previewData['sect2']['NCIA Social Media'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkSocial" class="custom-control-label">NCIA Social Media (Facebook, Instagram, Twitter, etc.)</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkNewspaper" name="chkNewspaper" value="Newspaper"
              @isset($previewData['sect2']['Newspaper'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkNewspaper" class="custom-control-label">Newspaper</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkRadio" name="chkRadio" value="Radio"
              @isset($previewData['sect2']['Radio'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkRadio" class="custom-control-label">Radio</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkTv" name="chkTv" value="TV"
              @isset($previewData['sect2']['TV'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkTv" class="custom-control-label">TV</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkStaff" name="chkStaff" value="NCIA Staff"
              @isset($previewData['sect2']['NCIA Staff'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkStaff" class="custom-control-label">NCIA Staff</label>
            </div>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputStaff" name="inputStaff" placeholder="Please indicate: " 
            value="{{ $previewData['sect2']['NCIA StaffComment'] ?? '' }}" readonly="readonly">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkGovern" name="chkGovern" value="Government/States Agencies"
              @isset($previewData['sect2']['Government/States Agencies'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkGovern" class="custom-control-label">Government/States Agencies</label>
            </div>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputGovern" name="inputGovern" placeholder="Please indicate: " 
            value="{{ $previewData['sect2']['Government/States AgenciesComment'] ?? '' }}" readonly="readonly">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkIndustry" name="chkIndustry" value="Industry Contact"
              @isset($previewData['sect2']['Industry Contact'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkIndustry" class="custom-control-label">Industry Contact</label>
            </div>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputIndustry" name="inputIndustry" placeholder="Please indicate: " 
            value="{{ $previewData['sect2']['Industry ContactComment'] ?? '' }}" readonly="readonly">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="chkOthers" name="chkOthers" value="Others"
              @isset($previewData['sect2']['Others'])
              checked
              @endisset onclick="return false;" disabled>
              <label for="chkOthers" class="custom-control-label">Others</label>
            </div>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputOthers" name="inputOthers" placeholder="Please indicate: " 
            value="{{ $previewData['sect2']['OthersComment'] ?? '' }}" readonly="readonly">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Table Part A --> 
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th style="width:  10%" scope="col">#</th>
        <th style="width:  75%" scope="col">Criteria</th>
        <th style="width:  15%" scope="col">Yes/No</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Are you involve in any Government project?</td>
        <td>                   
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rdoIsInvolved" id="inlineRadioRow1AY" value="1"
            @if ('1' == ($previewData['sect2']['is_involved'] ?? '')) checked @endif onclick="return false;" disabled>
            <label class="form-check-label" for="inlineRadioRow1AY">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rdoIsInvolved" id="inlineRadioRow1AN" value="0"
            @if ('0' == ($previewData['sect2']['is_involved'] ?? '')) checked @endif onclick="return false;" disabled>
            <label class="form-check-label" for="inlineRadioRow1AN">No</label>
          </div>
      </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Did you receive any financial assistant from the Government?</td>
        <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFinancialAssisted" id="inlineRadioRow2AY" value="1"
              @if ('1' == ($previewData['sect2']['financial_assisted'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow2AY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFinancialAssisted" id="inlineRadioRow2AN" value="0"
              @if ('0' == ($previewData['sect2']['financial_assisted'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow2AN">No</label>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Did you receive incentives from other Investment Promotion Agencies (IPAs)?</td>
        <td>  
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoIpaIncentives" id="inlineRadioRow3AY" value="1"
              @if ('1' == ($previewData['sect2']['ipa_incentives'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow3AY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoIpaIncentives" id="inlineRadioRow3AN" value="0"
              @if ('0' == ($previewData['sect2']['ipa_incentives'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow3AN">No</label>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Are you involved in any Talent or Wage Subsidy assistance from the Government?</td>
        <td>     
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoTwsAssisted" id="inlineRadioRow4AY" value="1"
              @if ('1' == ($previewData['sect2']['tws_assisted'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow4AY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoTwsAssisted" id="inlineRadioRow4AN" value="0"
              @if ('0' == ($previewData['sect2']['tws_assisted'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow4AN">No</label>
            </div>
        </td>
      </tr>
    </tbody>
  </table>


  <!-- Part B --> 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">PART B</label>
  </div>

  <!-- Table Part B --> 
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th style="width:  10%" scope="col">#</th>
        <th style="width:  75%" scope="col">Criteria</th>
        <th style="width:  15%" scope="col">Yes/No</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Involvement in any illegal lawsuit/dispute or facing bankruptcy?</td>
        <td>                         
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoIllegalLawsuit" id="inlineRadioRow1BY" value="1"
              @if ('1' == ($previewData['sect2']['illegal_lawsuit'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow1BY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoIllegalLawsuit" id="inlineRadioRow1BN" value="0"
              @if ('0' == ($previewData['sect2']['illegal_lawsuit'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow1BN">No</label>
            </div>
      </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Incorrect or fales declaration/representation of information, or submission of falsified documents to NCIA</td>
        <td>      
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFalseDeclare" id="inlineRadioRow2BY" value="1"
              @if ('1' == ($previewData['sect2']['false_Declare'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow2BY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFalseDeclare" id="inlineRadioRow2BN" value="0"
              @if ('0' == ($previewData['sect2']['false_Declare'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow2BN">No</label>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Involvement in fraud cases/court cases</td>
        <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFraud" id="inlineRadioRow3BY" value="1"
              @if ('1' == ($previewData['sect2']['fraud_case'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow3BY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoFraud" id="inlineRadioRow3BN" value="0"
              @if ('0' == ($previewData['sect2']['fraud_case'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow3BN">No</label>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Qualified Auditor's Opinion in the past two (2) years? 
          (A qualified opinion is a reflection of the auditor's inability to give an unqualified, or clean, audit opinion)
        </td>
        <td>    
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoAudit" id="inlineRadioRow4BY" value="1"
              @if ('1' == ($previewData['sect2']['audit_opinion'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow4BY">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rdoAudit" id="inlineRadioRow4BN" value="0"
              @if ('0' == ($previewData['sect2']['audit_opinion'] ?? '')) checked @endif onclick="return false;" disabled>
              <label class="form-check-label" for="inlineRadioRow4BN">No</label>
            </div>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Section 3 -->
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 3 EMPLOYEE DETAILS</h4></th>
      </tr>
    </thead>
  </table>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">PART A</label>
  </div>
  <!-- Table Part A --> 
  <table class="table table-bordered table-sm w-auto" onchange="calculateSectAmount2(this.value2)" required >
    <thead class="thead-dark">
      <tr>
        <th style="width:  50%" class="thalign" scope="col">Category</th>
        <th style="width:  50%" class="thalign" scope="col">No. of current employee</th>
      </tr>
      <tr>
        <td scope="row">(A) No. of employees (Malaysian)</th>
        <td class="tdtextboxalign">
          <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
          id="inputMalayEmp" name="inputMalayEmp" value="{{ $previewData['sect3']['inputMalayEmp'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
      <tr>
        <td scope="row">(B) No. of employees (Foreign)</th>
        <td class="tdtextboxalign">
          <input type="number" min=0 oninput="validity.valid||(value='');" class="text-center form-control" 
          id="inputForeignEmp" name="inputForeignEmp" value="{{ $previewData['sect3']['inputForeignEmp'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
    </thead>
      <tr>
        <th scope="row">TOTAL (A+B)=(C+D+E+F) </th>
        <td class="tdtextboxalign">
          <input type="number" class="form-control text-center boldformula" id="total1" name="total1" readonly="readonly">
        </td>
      </tr>
      <thead class="thead-dark">
      <tr>
        <td scope="row">(C) Management</th>
        <td class="tdtextboxalign">
          <input type="number" class="textboxalign border" min=0 oninput="validity.valid||(value='');" 
          id="inputManagement" style="width:98px;background-color:#e9ecef" name="inputManagement" value="{{ $previewData['sect3']['inputManagement'] ?? '' }}" readonly="readonly">
           out of
           <input type="number" class="textboxalign boldformula border" id="outof1" name="outof1" style="width:98px;background-color:#e9ecef" readonly="readonly">
           
        </td>
      </tr>
      <tr>
        <td scope="row">(D) Technical</td>
        <td class="tdtextboxalign">
          <input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign border" style="width:98px;background-color:#e9ecef" 
          id="inputTechnical" name="inputTechnical" value="{{ $previewData['sect3']['inputTechnical'] ?? '' }}" readonly="readonly">
          out of
          <input type="number" class="textboxalign boldformula border" id="outof2" name="outof2" style="width:98px;background-color:#e9ecef" readonly="readonly">
        </td>
      </tr>
      <tr>
        <td scope="row">(E) Supervisory</td>
        <td class="tdtextboxalign">
          <input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign border" style="width:98px;background-color:#e9ecef" 
          id="inputSupervisory" name="inputSupervisory" value="{{ $previewData['sect3']['inputSupervisory'] ?? '' }}" readonly="readonly">
          out of
          <input type="number" class="textboxalign boldformula border" id="outof3" name="outof3" style="width:98px;background-color:#e9ecef" readonly="readonly">
        </td>
      </tr>
      <tr>
        <td scope="row">(F) Others (E.g Operators)</td> 
        <td class="tdtextboxalign">
  
          <input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign border" style="width:98px;background-color:#e9ecef" 
          id="inputOthers" name="inputOthers" value="{{ $previewData['sect3']['inputOthers'] ?? '' }}" readonly="readonly">
          out of
          <input type="number" class="textboxalign boldformula border" id="outof4" name="outof4" style="width:98px;background-color:#e9ecef" readonly="readonly">
  
        </td>
      </tr>
    </thead>
      <tr>
        <th scope="row">MTS % = [(C+D+E)/TOTAL]*100</th>
        <td class="tdtextboxalign"><input  type="number" class="text-center form-control boldformula form-control" id="total2" name="total2" readonly="readonly"></td>
      </tr>
  </table>


<!-- Part B --> 
<div class="form-group row">
  <label class="col-sm-2 col-form-label"></label>
</div>
<div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">PART B</label>
</div>

<!-- Table Part B --> 
<table  class="table table-bordered table-sm w-auto" onchange="calculateSect3Amount1(this.value1)" required >
  <thead class="thead-dark">
  <tr>
    <th class="thalign" colspan="2" rowspan="2" >Category</th>
    <th class="thalign" colspan="6" >Job Creation (Projection)- year specific</th>
  </tr>
  <tr>
    <th class="thalign">2020</th>
    <th class="thalign" >2021</th>
    <th class="thalign" >2022</th>
    <th class="thalign" >2023</th>
    <th class="thalign" >2024</th>
    <th class="thalign">TOTAL</th>
  </tr>
  <tr>
    <td colspan="2">(a) No. of employees (Malaysian) </td>
    <td >
      <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center"  
      id="inputLocalYear1" name="inputLocalYear1" value="{{ $previewData['sect3']['inputLocalYear1'] ?? '' }}" readonly="readonly">
    </td>
    <td>
      <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
      id="inputLocalYear2" name="inputLocalYear2" value="{{ $previewData['sect3']['inputLocalYear2'] ?? '' }}" readonly="readonly">
    </td>
    <td class="tdtextboxalign">
      <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
      id="inputLocalYear3" name="inputLocalYear3" value="{{ $previewData['sect3']['inputLocalYear3'] ?? '' }}" readonly="readonly">
    </td>
    <td class="tdtextboxalign">
      <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
      id="inputLocalYear4" name="inputLocalYear4" value="{{ $previewData['sect3']['inputLocalYear4'] ?? '' }}" readonly="readonly">
    </td>
    <td class="tdtextboxalign">
      <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
      id="inputLocalYear5" name="inputLocalYear5" value="{{ $previewData['sect3']['inputLocalYear5'] ?? '' }}" readonly="readonly">
    </td>
    <td><input type="number" class="form-control text-center boldformula " name="sum1" id="sum1"  readonly="readonly"></td>
  </tr>
  <tr>
      <td colspan="2">(b) No. of employees Foreign </th>
      <td class="tdtextboxalign">
        <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
        id="inputForeignerYear1" name="inputForeignerYear1" value="{{ $previewData['sect3']['inputForeignerYear1'] ?? '' }}" readonly="readonly">
      </td>
      <td class="tdtextboxalign">
        <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
        id="inputForeignerYear2" name="inputForeignerYear2" value="{{ $previewData['sect3']['inputForeignerYear2'] ?? '' }}" readonly="readonly">
      </td>
      <td class="tdtextboxalign">
        <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
        id="inputForeignerYear3" name="inputForeignerYear3" value="{{ $previewData['sect3']['inputForeignerYear3'] ?? '' }}" readonly="readonly">
      </td>
      <td class="tdtextboxalign">
        <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
        id="inputForeignerYear4" name="inputForeignerYear4" value="{{ $previewData['sect3']['inputForeignerYear4'] ?? '' }}" readonly="readonly">
      </td>
      <td class="tdtextboxalign">
        <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center" 
        id="inputForeignerYear5" name="inputForeignerYear5" value="{{ $previewData['sect3']['inputForeignerYear5'] ?? '' }}" readonly="readonly">
      </td>
      <td>
        <input type="number" class="form-control text-center boldformula" name="sum2" readonly="readonly">
      </td>
  </tr>
</thead>
  <tr>
    <th colspan="2"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum2020" id="sum2020"  readonly="readonly"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum2021" id="sum2021"  readonly="readonly"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum2022" id="sum2022"  readonly="readonly"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum2023" id="sum2023"  readonly="readonly"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum2024" id="sum2024"  readonly="readonly"></td>
    <td><input type="number" class="form-control text-center boldformula" name="sum3" readonly="readonly"></td>
  </tr>
</table>


  <!-- Section 4 -->
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 4 FINANCIAL DETAILS</h4></th>
      </tr>
    </thead>
  </table>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>

  <table class="table table-bordered" >
    <caption>Note: Please provide Management Account if audited account is not available</caption>
    <thead class="thead-dark">
      <tr>
        <th class="thalign" style="width:  25%" scope="col">Financial (RM)/Year</th>
        <th class="thalign" style="width:  15%" scope="col">2015</th>
        <th class="thalign" style="width:  15%" scope="col">2016</th>
        <th class="thalign" style="width:  15%" scope="col">2017</th>
        <th class="thalign" style="width:  15%" scope="col">2018</th>
        <th class="thalign" style="width:  15%" scope="col">2019</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Revenue /Sales</th>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputRevYear1" name="inputRevYear1" value="{{ $previewData['sect4']['inputRevYear1'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputRevYear2" name="inputRevYear2" value="{{ $previewData['sect4']['inputRevYear2'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputRevYear3" name="inputRevYear3" value="{{ $previewData['sect4']['inputRevYear3'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputRevYear4" name="inputRevYear4" value="{{ $previewData['sect4']['inputRevYear4'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputRevYear5" name="inputRevYear5" value="{{ $previewData['sect4']['inputRevYear5'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
      <tr>
        <th scope="row">Net Profit/ (Loss) Before Tax</th>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputNetYear1" name="inputNetYear1" value="{{ $previewData['sect4']['inputNetYear1'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputNetYear2" name="inputNetYear2" value="{{ $previewData['sect4']['inputNetYear2'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputNetYear3" name="inputNetYear3" value="{{ $previewData['sect4']['inputNetYear3'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputNetYear4" name="inputNetYear4" value="{{ $previewData['sect4']['inputNetYear4'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputNetYear5" name="inputNetYear5" value="{{ $previewData['sect4']['inputNetYear5'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
      <tr>
        <th scope="row">Capital Expenditure</th>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputCapYear1" name="inputCapYear1" value="{{ $previewData['sect4']['inputCapYear1'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputCapYear2" name="inputCapYear2" value="{{ $previewData['sect4']['inputCapYear2'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputCapYear3" name="inputCapYear3" value="{{ $previewData['sect4']['inputCapYear3'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputCapYear4" name="inputCapYear4" value="{{ $previewData['sect4']['inputCapYear4'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputCapYear5" name="inputCapYear5" value="{{ $previewData['sect4']['inputCapYear5'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
      <tr>
        <th scope="row">Operational Expenditure</th>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputOpYear1" name="inputOpYear1" value="{{ $previewData['sect4']['inputOpYear1'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputOpYear2" name="inputOpYear2" value="{{ $previewData['sect4']['inputOpYear2'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputOpYear3" name="inputOpYear3" value="{{ $previewData['sect4']['inputOpYear3'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputOpYear4" name="inputOpYear4" value="{{ $previewData['sect4']['inputOpYear4'] ?? '' }}" readonly="readonly">
        </td>
        <td><input type="number" min=0 oninput="validity.valid||(value='');" class="form-control text-center text-right" 
          id="inputOpYear5" name="inputOpYear5" value="{{ $previewData['sect4']['inputOpYear5'] ?? '' }}" readonly="readonly">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Section 5 -->
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <table class="table table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 5 RECRUITMENT PLAN</h4></th>
      </tr>
    </thead>
  </table>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>


  <!-- Part A --> 
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">PART A</label>
  </div>
  <input type="hidden" id="useFormula" name="useFormula" value="{{ $previewData['sect5']['useFormula'] ?? '' }}">
  <!-- First Table --> 
  <table class="table table-bordered table-responsive-md" id="tbl1">
    <caption>Note: Fund is capped at a maximum of RM1,000 per month per participant for a period of 6 months. 
      It is inclusive of 100% EPF contribution and salary. Fund payment is by reimbursement method once per quarter. 
    </caption>
    <thead class="thead-dark">
      <tr>
        <th class="thalign align-text-top" style="width: 5%" scope="col">No.</th>
        <th class="thalign align-text-top" style="width: 20%" scope="col">Position (Position must be same as per stated in the offered letter)</th>
        <th class="thalign align-text-top" style="width: 20%"  scope="col">Qualification</th>
        <th class="thalign align-text-top"  scope="col">Minimum Salary (RM)</th>
        <th class="thalign align-text-top" style="width: 15%" scope="col">No. of pax (Hiring 2020)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if (count($previewData['sect5']['tbl1']) > 1)
      @foreach ($previewData['sect5']['tbl1'] as $tmp)
      <tr class="item" onchange="calculateAmount1(this.value)" required >
        <td class="addrow align-middle" scope="row"><input type="text" class="textboxalign text-center border" id="No1" name="No1" value="1" readonly="readonly" style="background-color:#e9ecef;height: 2.3em"></td>
        <td class="align-middle"><input type="text" class="form-control text-center" id="inputPosition" name="inputPosition[]" value="{{ $tmp['inputPosition'] ?? '' }}" style="background-color:#e9ecef" readonly="readonly"></td>
        <td class="align-middle">
          <input type="hidden" id="hiddenDegree" value="{{$tmp['degree']}}"/>
          <input type="text" class="form-control text-center" id="inputPosition" name="inputPosition[]"  
          @switch($tmp['degree'])
          @case(1)
          value="Degree/Master/PhD"
          @break

          @case(2)
          value="Advance Dip/Diploma"
          @break

          @case(3)
          value="Certificate (SKM3 or equivalent)"
          @break

          @case(4)
          value="School Leavers"
          @break
          @endswitch
          style="background-color:#e9ecef" readonly="readonly">
        </td>
        <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" step="0.01" style="background-color:#e9ecef"
          class="form-control text-center text-right" id="inputSalary" name="inputSalary[]" value="{{ $tmp['inputSalary'] ?? '' }}" readonly="readonly"></td>
        <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" style="background-color:#e9ecef"
          class="form-control text-center" id="inputPax" name="inputPax[]" value="{{ $tmp['inputPax'] ?? '' }}" readonly="readonly"></td>
        <td class="text-center">
          <label id="lbFormula" name="lbFormula[]"></label>
          <input type="number" class="form-control text-center boldformula text-right" id="funding" name="funding" readonly="readonly">

        </td>
      </tr>
      @endforeach
      @else
      <tr class="item" onchange="calculateAmount1(this.value)" required >
        <td class="addrow align-middle" scope="row"><input type="text" class="textboxalign border" id="No1" name="No1" value="1" readonly="readonly" style="background-color:#e9ecef;height: 2.3em" ></td>
        <td class="align-middle">
          <input type="text" class="form-control text-center" id="inputPosition" name="inputPosition[]" style="background-color:#e9ecef"
          value="{{ $previewData['sect5']['tbl1'][0]['inputPosition'] ?? '' }}" readonly="readonly">
        </td>
        <td class="align-middle">
          <input type="hidden" id="hiddenDegree" value="{{$previewData['sect5']['tbl1'][0]['degree']}}"/>
          <input type="text" class="form-control text-center" id="inputPosition" name="inputPosition[]"  
          @switch($previewData['sect5']['tbl1'][0]['degree'])
          @case(1)
          value="Degree/Master/PhD"
          @break

          @case(2)
          value="Advance Dip/Diploma"
          @break

          @case(3)
          value="Certificate (SKM3 or equivalent)"
          @break

          @case(4)
          value="School Leavers"
          @break
          @endswitch
          style="background-color:#e9ecef" readonly="readonly">
        </td>
        <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" step="0.01" style="background-color:#e9ecef"
          class="form-control text-center text-right" id="inputSalary" name="inputSalary[]" value="{{ $previewData['sect5']['tbl1'][0]['inputSalary'] ?? '' }}" readonly="readonly"></td>
        <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" style="background-color:#e9ecef"
          class="form-control text-center" id="inputPax" name="inputPax[]" value="{{ $previewData['sect5']['tbl1'][0]['inputPax'] ?? '' }}" readonly="readonly"></td>
        <td class="text-center">
          <label id="lbFormula" name="lbFormula[]"></label>
          <input type="number" class="form-control text-center boldformula text-right" id="funding" name="funding" style="background-color:#e9ecef" readonly="readonly"></td>
      </tr>
      @endif
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4" class="align-middle" style="text-align: right;">TOTAL</th>
        <th><input type="number" class="form-control text-center boldformula" name="totalpax" id="totalpax" style="background-color:#e9ecef;padding-left: 10px"  readonly="readonly"></th>
        <th><input type="number" class="form-control text-center boldformula text-right" name="totalfunding" id="totalfunding"  style="background-color:#e9ecef" readonly="readonly"></th>
      </tr>
    </tfoot>
  </table>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
  </div>

  <!-- Part B --> 
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">PART B</label>
  </div>


  <!-- Second Table --> 
  <table  class="table table-bordered table-responsive-md" id="tbl2">
    <caption>Note: Hiring period to commence within the first month of approval date. All hiring must be completed in Year 2020.  
    </caption>
    <thead class="thead-dark">
    <tr>
      <th class="thalign align-text-top" style="width:  5%" scope="col" colspan="2" rowspan="2">No.</th>
      <th class="thalign align-text-top" colspan="2" rowspan="2" style="width:  20%" >Position (Position must be same as per stated in the offered letter)</th>
      <th class="thalign" colspan="3" >Hiring Plan (Please state your hiring plan for the requested penjanaNCER Participants)</th>
      <th class="thalign align-text-top" style="width:  20%" scope="col" colspan="2" rowspan="2">Total</th>										  									  
    </tr>
    <tr>
      <th class="thalign">Month 1</th>
      <th class="thalign">Month 2</th>
      <th class="thalign">Month 3</th>
    </tr>
  </thead>
  <tbody>
    @if (count($previewData['sect5']['tbl2']) > 1)
    @foreach ($previewData['sect5']['tbl2'] as $tmp)
    <tr class="item2"  onchange="calculateAmount2(this.value)" required >
      <td colspan="2">
        <input type="text" class="textboxalign text-center border" id="No2" name="No2" value="1" readonly="readonly" style="background-color:#e9ecef;height: 2.3em"></td>
      <td colspan="2">
        <input type="text" class="form-control text-center" style="background-color:#e9ecef"
        id="inputPosition2" name="inputPosition2[]" value="{{ $tmp['inputPosition2'] ?? '' }}"></td>
      <td>
        <input type="number" min=0 oninput="validity.valid||(value='');" class="text-center form-control" style="background-color:#e9ecef"
        id="inputMonth1" name="inputMonth1[]" value="{{ $tmp['inputMonth1'] ?? '' }}" readonly="readonly"></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="text-center  form-control" style="background-color:#e9ecef"
        id="inputMonth2" name="inputMonth2[]" value="{{ $tmp['inputMonth2'] ?? '' }}" readonly="readonly"></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="text-center  form-control" style="background-color:#e9ecef"
        id="inputMonth3" name="inputMonth3[]" value="{{ $tmp['inputMonth3'] ?? '' }}" readonly="readonly"></td>
      <td colspan="2">
        <input type="number" class="form-control text-center boldformula" name="totalfundingmonth" id="totalfundingmonth" style="background-color:#e9ecef"  readonly="readonly"></td>
    </tr>
    @endforeach
    @else
    <tr class="item2"  onchange="calculateAmount2(this.value)" required >
      <td colspan="2">
        <input type="text" class="textboxalign text-center border" id="No2" name="No2" value="1" readonly="readonly" style="background-color:#e9ecef;height: 2.3em" ></td>
      <td colspan="2">
        <input type="text" class="form-control text-center" style="background-color:#e9ecef"
        id="inputPosition2" name="inputPosition2[]" value="{{ $previewData['sect5']['tbl2'][0]['inputPosition2'] ?? '' }}" readonly="readonly"></td>
      <td>
        <input type="number" min=0 oninput="validity.valid||(value='');" class="text-center  form-control" style="background-color:#e9ecef"
        id="inputMonth1" name="inputMonth1[]" value="{{ $previewData['sect5']['tbl2'][0]['inputMonth1'] ?? '' }}" readonly="readonly"></td>
      <td>
        <input type="number" min=0 oninput="validity.valid||(value='');" class="text-center  form-control" style="background-color:#e9ecef"
        id="inputMonth2" name="inputMonth2[]" value="{{ $previewData['sect5']['tbl2'][0]['inputMonth2'] ?? '' }}" readonly="readonly"></td>
      <td>
        <input type="number" min=0 oninput="validity.valid||(value='');" class="text-center  form-control" style="background-color:#e9ecef"
        id="inputMonth3" name="inputMonth3[]" value="{{ $previewData['sect5']['tbl2'][0]['inputMonth3'] ?? '' }}" readonly="readonly"></td>
      <td colspan="2">
        <input type="number" class="form-control text-center boldformula" name="totalfundingmonth" id="totalfundingmonth" style="background-color:#e9ecef" readonly="readonly"></td>
    </tr>
    @endif
  </tbody>
  <tfoot>
      <tr>
        <th colspan="7" class="align-middle" style="text-align: right">TOTAL</th>
        <th colspan="2"><input type="number" class="form-control text-center boldformula" name="totalpax2" id="totalpax2" readonly="readonly"></th>
      </tr>
  </tfoot>
  </table>




    <!-- Section 6 -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
    </div>
    <table class="table table-bordered" >
      <thead class="thead-dark">
        <tr>
          <th class="text-lg-center" style="width:  10%" scope="col"><h4>SECTION 6 SUPPORTING DOCUMENT</h4></th>
        </tr>
      </thead>
    </table>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
    </div>


    <table class="table table-bordered" >
      <thead class="thead-dark">
        <tr>
          <th style="width:  10%" scope="col">#</th>
          <th style="width:  60%" scope="col">Criteria</th>
          <th class="thalign" style="width:  30%" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1.</th>
          <td>Company logo </td>
          <td>  
            <div style="display: block;margin-left: auto;margin-right: auto;">
              <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][1])) }}" target="_blank">
                <img src="{{ asset('img/file.png') }}" alt="" style="">
                <span>{{$previewData['sect6']['docs'][1]}}</span></a>
              </div>   
          </td>

        </tr>
        <tr>
          <th scope="row">2.</th>
          <td>Organization Structure</td>
          <td>    
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][2])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][2]}}</span></a>
              </div>  
        </tr>
        <tr>
          <th scope="row">3.</th>
          <td>License and/or relevant certification relating to company activities</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][3])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][3]}}</span></a>
                </div>    
            </td>
        </tr>
        <tr>
          <th scope="row">4.</th>
          <td>Latest 3 years financial audited statement</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][4])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][4]}}</span></a>
                </div>      
            </td>
        </tr>
        <tr>
          <th scope="row">5.</th>
          <td>Memorandum and Articles of Association</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][5])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][5]}}</span></a>
                </div>     
            </td>
        </tr>
        <tr>
          <th scope="row">6.</th>
          <td>From 9 - Certificate of Incorporation</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][6])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][6]}}</span></a>
                </div>      
            </td>
        </tr>
        <tr>
          <th scope="row">7.</th>
          <td>Form 24 - Particulars of Allotment of Shares</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][7])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][7]}}</span></a>
                </div>    
            </td>
        </tr>
        <tr>
          <th scope="row">8.</th>
          <td>Form 49 - Particulars in Register of Directors, Managers and Secretaries and Changes of Particulars <a href=""><i class="fa fa-eye"></td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][8])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][8]}}</span></a>
                </div>   
            </td>
        </tr>
        <tr>
          <th scope="row">9.</th>
          <td>Form 13 - CHange of name</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][9])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][9]}}</span></a>
                </div>     
            </td>
        </tr>
        <tr>
          <th scope="row">10.</th>
          <td>Form 32A - Transfer of Shares</td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][10])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][10]}}</span></a>
                </div>      
            </td>
        </tr>
        <tr>
          <th scope="row">11.</th>
          <td>Form 20 - Return on change of Private Limited to Public Limited </td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][11])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][11]}}</span></a>
                </div>   
            </td>
        </tr>
        <tr>
          <th scope="row">12.</th>
          <td>Other relevant registration documents relating to nature of business </td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][12])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][12]}}</span></a>
                </div>      
            </td>
        </tr>
        <tr>
          <th scope="row">13.</th>
          <td>Recruitment Job Description and Training Plan (Training Description & Milestone)<a href=""><i class="fa fa-eye"></td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][13])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][13]}}</span></a>
                </div>      
            </td>
        </tr>
        <tr>
          <th scope="row">14.</th>
          <td>Company Director's Resolution <a href=""><i class="fa fa-eye"></td>
            <td>     
              <div style="display: block;margin-left: auto;margin-right: auto;">
                <a href="{{ url("/supportDoc/".$previewData['sect1']['id']."/".urlencode($previewData['sect6']['docs'][14])) }}" target="_blank">
                  <img src="{{ asset('img/file.png') }}" alt="" style="">
                  <span>{{$previewData['sect6']['docs'][14]}}</span></a>
                </div>  
            </td>
        </tr>
      </tbody>
    </table>

</div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!--<button type="submit" class="btn btn-success float-right">Approval Letter</button>-->
  </div>
  <!-- /.card-footer -->

</section>

  @section('jsscript')
<!-- Page script -->
<!-- section 3 -->
<script>
  function calculateSect3Amount1(val1) {

      let numlocal1 = document.getElementsByName("inputLocalYear1")[0].value;
      let numlocal2 = document.getElementsByName("inputLocalYear2")[0].value;
      let numlocal3 = document.getElementsByName("inputLocalYear3")[0].value;
      let numlocal4 = document.getElementsByName("inputLocalYear4")[0].value;
      let numlocal5 = document.getElementsByName("inputLocalYear5")[0].value;
      let sum1 = Number(numlocal1) + Number(numlocal2) + Number(numlocal3) 
      + Number(numlocal4) + Number(numlocal5) ;
      document.getElementsByName("sum1")[0].value = sum1;

      let numforeign1 = document.getElementsByName("inputForeignerYear1")[0].value;
      let numforeign2 = document.getElementsByName("inputForeignerYear2")[0].value;
      let numforeign3 = document.getElementsByName("inputForeignerYear3")[0].value;
      let numforeign4 = document.getElementsByName("inputForeignerYear4")[0].value;
      let numforeign5 = document.getElementsByName("inputForeignerYear5")[0].value;
      let sum2 = Number(numforeign1) + Number(numforeign2) 
      + Number(numforeign3) + Number(numforeign4) + + Number(numforeign5);
      document.getElementsByName("sum2")[0].value = sum2;

      let sum3 = Number(sum1) + Number(sum2);
      document.getElementsByName("sum3")[0].value = sum3;

      let sum2020 = Number(numlocal1) + Number(numforeign1);
      document.getElementsByName("sum2020")[0].value = sum2020;

      let sum2021 = Number(numlocal2) + Number(numforeign2);
      document.getElementsByName("sum2021")[0].value = sum2021;

      let sum2022 = Number(numlocal3) + Number(numforeign3);
      document.getElementsByName("sum2022")[0].value = sum2022;

      let sum2023 = Number(numlocal4) + Number(numforeign4);
      document.getElementsByName("sum2023")[0].value = sum2023;

      let sum2024 = Number(numlocal5) + Number(numforeign5);
      document.getElementsByName("sum2024")[0].value = sum2024;

  }

  function calculateSect3Amount2(val2) {
      let num1 = document.getElementsByName("inputMalayEmp")[0].value;
      let num2 = document.getElementsByName("inputForeignEmp")[0].value;
      let total1 = Number(num1) + Number(num2);
      document.getElementsByName("total1")[0].value = total1;

      let outof1 = Number(num1) + Number(num2);
      document.getElementsByName("outof1")[0].value = outof1;

      let outof2 = Number(num1) + Number(num2);
      document.getElementsByName("outof2")[0].value = outof2;

      let outof3 = Number(num1) + Number(num2);
      document.getElementsByName("outof3")[0].value = outof3;

      let outof4 = Number(num1) + Number(num2);
      document.getElementsByName("outof4")[0].value = outof4;

      let num3 = document.getElementsByName("inputManagement")[0].value;
      let num4 = document.getElementsByName("inputTechnical")[0].value;
      let num5 = document.getElementsByName("inputSupervisory")[0].value;
      let num6 = document.getElementsByName("inputOthers")[0].value;

      let total2 = (((Number(num3) + Number(num4) + Number(num5))/total1)*100).toFixed(2);
      document.getElementsByName("total2")[0].value = total2;

  }

  $(document).ready(function() {
    calculateSect3Amount1(0);
    calculateSect3Amount2(0);
  });

</script>
<!-- section 5 -->
<script>
    $(document).ready(function(){
      setRowNoTbl1();
      setRowNoTbl2();
      calculateAmount1();
      calculateAmount2();
    });
  function setRowNoTbl1(){
    var count = 1;
    $("tr.item").each(function() {
      $(this).find("input#No1").val(count++);
    });
  }

  function setRowNoTbl2(){
    var count = 1;
    $("tr.item2").each(function() {
      $(this).find("input#No2").val(count++);
    });
  }
  

  // Calculate Funding Request for Table 1
  function calculateAmount1(val1) {
    var useFormula = document.getElementById("useFormula").value;
    var total = 0, totalpax = 0 ;
    $("tr.item").each(function() {
          var salary = $(this).find("input#inputSalary").val(),
          degree = $(this).find("input#hiddenDegree").val(),
          pax = $(this).find("input#inputPax").val()!=""? parseInt($(this).find("input#inputPax").val(), 10) : 0;

          if(useFormula=='0' && degree=='1'){
            ntep = 1000;
          }else{
            ntep = (salary / 2)>1000? 1000 : (salary / 2);
          }

          $(this).find("#lbFormula").text((ntep.toString() + " X " + pax.toString()));
          $(this).find("input#funding").val((ntep * pax).toFixed(2));
          

          total += (ntep * pax);
          totalpax += pax;
    });
    //put in total value
    $('#totalpax').val(totalpax);
    $('#totalfunding').val(total.toFixed(2));

  }

  function calculateAmount2(val2) {
    var totalfunding = 0 ;
    $("tr.item2").each(function() {
        var month1 = $(this).find("input#inputMonth1").val();
        var month2 = $(this).find("input#inputMonth2").val();
        var month3 = $(this).find("input#inputMonth3").val();
        var sum = Number(month1) + Number(month2) + Number(month3);
        $(this).find("input#totalfundingmonth").val(sum);

        totalfunding += sum;
    });
    //put in total value
    $('#totalpax2').val(totalfunding);
    setRowNoTbl2();
  }

</script>
@endsection