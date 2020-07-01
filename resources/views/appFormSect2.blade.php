@extends('appForm')

@section('tabTitle')
Pre-Qualification Criteria
@endsection

@section('sectBody')

<form class="form-horizontal" id="appForm" method="post" action="{{ url('/sct2Save') }}">
    @csrf
    <input type="hidden" id="applicantId" name="applicantId" value="{{ $appForm['id'] ?? '' }}">
    <input type="hidden" id="act" name="act" value="{{ $loadData['act'] ?? '' }}">
    <div class="card-body">
        <p>View sample form here <a href=""><i class="fa fa-eye"></i></a></p>
      <!-- Part A --> 
      <div class="form-group row">
        <label  class="col-sm-2 col-form-label">PART A</label>
      </div>
      <div class="form-group row">
        <label  class="col-sm-4 col-form-label">PLEASE TICK INITIAL CONTACT ON NTEP:</label>
      </div>
      <div class="form-group row">
        <span class="col-sm-4 text-danger" >
          @isset($errMsg['contact'])
          {{$errMsg['contact']}}
          @endisset
        </span>
      </div>

      <div class="form-group row">
        <label class="col-sm-1 col-form-label"> </label>
        <div class="col-sm-10">
          <div class="form-group">

            <div class="form-group row">
              <div class="col-sm-9">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkWebsite" name="chkWebsite" value="NCIA Website"
                  @isset($appForm['NCIA Website'])
                  checked
                  @endisset>
                  
                  <label for="chkWebsite" class="custom-control-label">NCIA Website</label>
                </div>
              </div>
            </div>
    
            <div class="form-group row">
              <div class="col-sm-9">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkSocial" name="chkSocial" value="NCIA Social Media"
                  @isset($appForm['NCIA Social Media'])
                  checked
                  @endisset>
                  <label for="chkSocial" class="custom-control-label">NCIA Social Media (Facebook, Instagram, Twitter, etc.)</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-9">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkNewspaper" name="chkNewspaper" value="Newspaper"
                  @isset($appForm['Newspaper'])
                  checked
                  @endisset>
                  <label for="chkNewspaper" class="custom-control-label">Newspaper</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-9">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkRadio" name="chkRadio" value="Radio"
                  @isset($appForm['Radio'])
                  checked
                  @endisset>
                  <label for="chkRadio" class="custom-control-label">Radio</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-9">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkTv" name="chkTv" value="TV"
                  @isset($appForm['TV'])
                  checked
                  @endisset>
                  <label for="chkTv" class="custom-control-label">TV</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkStaff" name="chkStaff" value="NCIA Staff"
                  @isset($appForm['NCIA Staff'])
                  checked
                  @endisset>
                  <label for="chkStaff" class="custom-control-label">NCIA Staff</label>
                </div>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputStaff" name="inputStaff" placeholder="Please indicate: " 
                value="{{ $appForm['NCIA StaffComment'] ?? '' }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkGovern" name="chkGovern" value="Government/States Agencies"
                  @isset($appForm['Government/States Agencies'])
                  checked
                  @endisset>
                  <label for="chkGovern" class="custom-control-label">Government/States Agencies</label>
                </div>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputGovern" name="inputGovern" placeholder="Please indicate: " 
                value="{{ $appForm['Government/States AgenciesComment'] ?? '' }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkIndustry" name="chkIndustry" value="Industry Contact"
                  @isset($appForm['Industry Contact'])
                  checked
                  @endisset>
                  <label for="chkIndustry" class="custom-control-label">Industry Contact</label>
                </div>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputIndustry" name="inputIndustry" placeholder="Please indicate: " 
                value="{{ $appForm['Industry ContactComment'] ?? '' }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="chkOthers" name="chkOthers" value="Others"
                  @isset($appForm['Others'])
                  checked
                  @endisset>
                  <label for="chkOthers" class="custom-control-label">Others</label>
                </div>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputOthers" name="inputOthers" placeholder="Please indicate: " 
                value="{{ $appForm['OthersComment'] ?? '' }}">
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
                @if ('1' == ($appForm['is_involved'] ?? '')) checked @endif>
                <label class="form-check-label" for="inlineRadioRow1AY">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rdoIsInvolved" id="inlineRadioRow1AN" value="0"
                @if ('0' == ($appForm['is_involved'] ?? '')) checked @endif>
                <label class="form-check-label" for="inlineRadioRow1AN">No</label>
              </div>
              <span class="text-danger" >
                @isset($errMsg['is_involved'])
                {{$errMsg['is_involved']}}
                @endisset
              </span>
          </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Did you receive any financial assistant from the Government?</td>
            <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFinancialAssisted" id="inlineRadioRow2AY" value="1"
                  @if ('1' == ($appForm['financial_assisted'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow2AY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFinancialAssisted" id="inlineRadioRow2AN" value="0"
                  @if ('0' == ($appForm['financial_assisted'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow2AN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['financial_assisted'])
                  {{$errMsg['financial_assisted']}}
                  @endisset
                </span>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Did you receive incentives from other Investment Promotion Agencies (IPAs)?</td>
            <td>  
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoIpaIncentives" id="inlineRadioRow3AY" value="1"
                  @if ('1' == ($appForm['ipa_incentives'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow3AY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoIpaIncentives" id="inlineRadioRow3AN" value="0"
                  @if ('0' == ($appForm['ipa_incentives'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow3AN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['ipa_incentives'])
                  {{$errMsg['ipa_incentives']}}
                  @endisset
                </span>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Are you involved in any Talent or Wage Subsidy assistance from the Government?</td>
            <td>     
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoTwsAssisted" id="inlineRadioRow4AY" value="1"
                  @if ('1' == ($appForm['tws_assisted'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow4AY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoTwsAssisted" id="inlineRadioRow4AN" value="0"
                  @if ('0' == ($appForm['tws_assisted'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow4AN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['tws_assisted'])
                  {{$errMsg['tws_assisted']}}
                  @endisset
                </span>
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
                  @if ('1' == ($appForm['illegal_lawsuit'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow1BY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoIllegalLawsuit" id="inlineRadioRow1BN" value="0"
                  @if ('0' == ($appForm['illegal_lawsuit'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow1BN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['illegal_lawsuit'])
                  {{$errMsg['illegal_lawsuit']}}
                  @endisset
                </span>
          </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Incorrect or fales declaration/representation of information, or submission of falsified documents to NCIA</td>
            <td>      
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFalseDeclare" id="inlineRadioRow2BY" value="1"
                  @if ('1' == ($appForm['false_Declare'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow2BY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFalseDeclare" id="inlineRadioRow2BN" value="0"
                  @if ('0' == ($appForm['false_Declare'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow2BN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['false_Declare'])
                  {{$errMsg['false_Declare']}}
                  @endisset
                </span>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Involvement in fraud cases/court cases</td>
            <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFraud" id="inlineRadioRow3BY" value="1"
                  @if ('1' == ($appForm['fraud_case'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow3BY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoFraud" id="inlineRadioRow3BN" value="0"
                  @if ('0' == ($appForm['fraud_case'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow3BN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['fraud_case'])
                  {{$errMsg['fraud_case']}}
                  @endisset
                </span>
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
                  @if ('1' == ($appForm['audit_opinion'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow4BY">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rdoAudit" id="inlineRadioRow4BN" value="0"
                  @if ('0' == ($appForm['audit_opinion'] ?? '')) checked @endif>
                  <label class="form-check-label" for="inlineRadioRow4BN">No</label>
                </div>
                <span class="text-danger" >
                  @isset($errMsg['audit_opinion'])
                  {{$errMsg['audit_opinion']}}
                  @endisset
                </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      @if ('view' != ($loadData['act'] ?? '')) 
      <button type="submit" class="btn btn-success save-btn float-right">Save</button>
      @endif
    </div>
    <!-- /.card-footer -->
  </form>
@endsection

@section('jsscript')
<!-- Page script -->
<script>
  $(document).ready(function(){
      if($("#act").val()=="view")
      {
          $("#appForm :input").prop("disabled", true);
      }
    });
</script>
@endsection