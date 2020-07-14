@extends('appForm')

@section('tabTitle')
Section 1: Company Profile
@endsection

@section('sectBody')
<form class="form-horizontal" method="post" action="{{ url('/sct1Save') }}">
    @csrf
     <input type="hidden" id="appId" name="appId" value="{{ $appForm['id'] ?? '' }}">
     <input type="hidden" id="act" name="act" value="{{ $loadData['act'] ?? '' }}">
    <div class="card-body">
        <!--<p>View sample form here <a href=""><i class="fa fa-eye"></i></a></p>-->
        <!-- Company Name -->
        <p>Note: please complete all sections and submit application forms at section 7	</p>
        <div class="row">
          <label for="errorCompName" class="col-sm-3" > </label>
          <div class="col-sm-9">
                  <span class="text-danger" for="inputCompName">
                    @isset($errMsg['co_name'])
                    {{$errMsg['co_name']}}
                    @endisset
                  </span>
          </div>
        </div>
      <div class="form-group row">
        <label for="inputCompName" class="col-sm-3 col-form-label">Company Name/ Applicant</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputCompName" name="inputCompName" 
        placeholder="Company Name/ Applicant" value="{{ $appForm['co_name'] ?? '' }}">
        </div>
      </div>

      <!-- Incorporation Date -->
      <div class="row">
        <label for="errorIncorpDate" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="incorpDate">
                  @isset($errMsg['incorporation_date'])
                  {{$errMsg['incorporation_date']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputIncorpDate" class="col-sm-3 col-form-label">Incorporation Date</label>
        <div class="col-sm-9">
          <div class="input-group date" id="incorpdate" data-target-input="nearest">
            <div class="input-group-append" data-target="#incorpdate" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" id="inputIncorpDate" name="inputIncorpDate"
             data-target="#incorpdate" data-toggle="datetimepicker"
             placeholder="Incorporation Date" 
             value="{{ isset($appForm['incorporation_date']) ? date( "d-m-Y",strtotime($appForm['incorporation_date'])) : '' }}"/>
             <!----> 
            
        </div>
        </div>
      </div>
      
      <!-- SSMNumber -->
      <div class="row">
        <label for="errorSSMNumber" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputSSMno">
                  @isset($errMsg['ssm_no'])
                  {{$errMsg['ssm_no']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputSSMno" class="col-sm-3 col-form-label">SSM Registration Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputSSMno" name="inputSSMno" 
          placeholder="SSM Registration Number" value="{{ $appForm['ssm_no'] ?? '' }}">
        </div>
      </div>

      <!-- PaidUp -->
      <div class="row">
        <label for="errorPaidUp" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputCapital">
                  @isset($errMsg['paid_capital'])
                  {{$errMsg['paid_capital']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCapital" class="col-sm-3 col-form-label">Paid-up Capital (RM)</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="inputCapital" name="inputCapital" value="{{ $appForm['paid_capital'] ?? '' }}"
          placeholder="Paid-up Capital (RM)" step=".01">
        </div>
      </div>

      <!-- RegAddress -->
      <div class="row">
        <label for="errorRegAddress" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputRegAddress">
                  @isset($errMsg['reg_addr'])
                  {{$errMsg['reg_addr']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputRegAddress" class="col-sm-3 col-form-label">Registered Address</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputRegAddress" value="{{ $appForm['reg_addr'] ?? '' }}" 
          name="inputRegAddress" placeholder="Registered Address">
        </div>
      </div>

      <!-- BussinessAddress -->
      <div class="row">
        <label for="errorBussinessAddress" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputBussinessAddress">
                  @isset($errMsg['biz_addr'])
                  {{$errMsg['biz_addr']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputBussinessAddress" class="col-sm-3 col-form-label">Business Address</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputBussinessAddress" name="inputBussinessAddress" 
          value="{{ $appForm['biz_addr'] ?? '' }}" placeholder="Business Address">
        </div>
      </div>

      <!-- ContactNumber &  Designation -->
      <div class="row">
        <label for="errorContactNumber" class="col-sm-3" > </label>
        <div class="col-sm-3">
                <span class="text-danger" for="inputContactNumber" name="inputContactNumber">
                  @isset($errMsg['contact_no'])
                  {{$errMsg['contact_no']}}
                  @endisset
                </span>
        </div>
        <label for="errorDesignation" class="col-sm-3" > </label>
        <div class="col-sm-3">
                <span class="text-danger" for="inputDesignation" name="inputDesignation">
                  @isset($errMsg['designation'])
                  {{$errMsg['designation']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputContactNumber" class="col-sm-3 col-form-label">Contact Person Number</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" value="{{ $appForm['contact_no'] ?? '' }}"
          id="inputContactNumber" name="inputContactNumber" placeholder="Contact Person Number">
        </div>
        <div class="col-sm-1">
        </div>
        <label for="inputDesignation" class="col-sm-2 col-form-label">Designation</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputDesignation" name="inputDesignation" 
          value="{{ $appForm['designation'] ?? '' }}" placeholder="Designation">
        </div>
      </div>

      <!-- Email &  FaxNumber -->  
      <div class="row">
        <label for="errorEmail" class="col-sm-3" > </label>
        <div class="col-sm-3">
                <span class="text-danger" for="inputEmail">
                  @isset($errMsg['email'])
                  {{$errMsg['email']}}
                  @endisset
                </span>
        </div>
        <label for="errorFaxNumber" class="col-sm-3" > </label>
        <div class="col-sm-3">
                <span class="text-danger" for="inputFaxNumber">
                  @isset($errMsg['fax'])
                  {{$errMsg['fax']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputEmail" name="inputEmail" 
          value="{{ $appForm['email'] ?? '' }}" placeholder="Email">
        </div>
        <div class="col-sm-1">
        </div>
        <label for="inputFaxNumber" class="col-sm-2 col-form-label">Fax.No</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" id="inputFaxNumber" name="inputFaxNumber" 
          value="{{ $appForm['fax'] ?? '' }}" placeholder="Fax.No">
        </div>
      </div>

      <!-- Website --> 
      <div class="row">
        <label for="errorWebsite" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputWebsite">
                  @isset($errMsg['website'])
                  {{$errMsg['website']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputWebsite" class="col-sm-3 col-form-label">Website</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputWebsite" name="inputWebsite" 
          value="{{ $appForm['website'] ?? '' }}" placeholder="Website">
        </div>
      </div>

      <!-- Equalty --> 
      <div class="row">
        <label for="errorEmail" class="col-sm-3" > </label>
        <div class="col-sm-5">
                <span class="text-danger" for="inputEqualty1">
                  @isset($errMsg['equity'])
                  {{$errMsg['equity']}}
                  @endisset
                </span>
        </div>
        <label for="errorFaxNumber" class="col-sm-1" > </label>
        <div class="col-sm-1">
                <span class="text-danger" for="Equalty2">
                  @isset($errMsg['foreigner'])
                  {{$errMsg['foreigner']}}
                  @endisset
                </span>
        </div>
      </div>
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
            value="{{ $appForm['equity'] ?? '' }}" placeholder="Malaysian" max="100">
            <div class="input-group-prepend">
              <span class="input-group-text">%</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group mb-3">
            
            <input type="number" class="form-control" id="Equalty2" 
            value="{{ $appForm['equity'] ?(100 -$appForm['equity']) :'' }}"
            placeholder="Foreign" max="100">
            <div class="input-group-prepend">
              <span class="input-group-text">%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Holding -->
      <div class="row">
        <label for="errorHolding" class="col-sm-3" > </label>
        <div class="col-sm-9">
                <span class="text-danger" for="inputHolding">
                  @isset($errMsg['parent_co'])
                  {{$errMsg['parent_co']}}
                  @endisset
                </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputHolding" class="col-sm-3">Name of Ultimate Holding/ Parent Company</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputHolding" name="inputHolding" 
          value="{{ $appForm['parent_co'] ?? '' }}" placeholder="Name of Ultimate Holding/ Parent Company">
        </div>
      </div>

      <!-- Country of Origin -->
      <div class="form-group row">
        <label for="selCountry" class="col-sm-3 col-form-label">Country of Origin</label>
        <div class="col-sm-9">
          <select class="form-control" id="selCountry" name="selCountry">
            @foreach ($loadData['countries'] as $country)
              <option @if ($country == ($appForm['country'] ?? '')) selected @endif>{{$country}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Type of Industry -->
      <div class="form-group row">
        <label for="selIndustry" class="col-sm-3 col-form-label">Type of Industry</label>
        <div class="col-sm-9">
          <select class="form-control" id="selIndustry" name="selIndustry">
            <option @if ('MNC' == ($appForm['industry_type']?? '')) selected @endif>MNC</option>
            <option @if ('LLC' == ($appForm['industry_type']?? '')) selected @endif>LLC</option>
            <option @if ('SME' == ($appForm['industry_type']?? '')) selected @endif>SME</option>
          </select>
        </div>
      </div>

      <!-- SECTOR/ SUB-SECTOR -->
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">SECTOR/ SUB-SECTOR</label>
        <div class="col-sm-6">
          <!-- select -->
          <div class="form-group">
            <select class="form-control" id="selSector" name="selSector">
              <optgroup label="Manufacturing">
              <option @if ('Green Technology' == ($appForm['sector']?? '')) selected @endif>Green Technology</option>
              <option @if ('Medical Devices' == ($appForm['sector']?? '')) selected @endif>Medical Devices</option>
              <option @if ('Automotive' == ($appForm['sector']?? '')) selected @endif>Automotive</option>
              <option @if ('Additive Manufacturing' == ($appForm['sector']?? '')) selected @endif>Additive Manufacturing</option>
              <option @if ('Aerospace' == ($appForm['sector']?? '')) selected @endif>Aerospace</option>
              </optgroup>
              <optgroup label="Agriculture & Bio-industries">
                <option @if ('Sustainable Agriculture' == ($appForm['sector']?? '')) selected @endif>Sustainable Agriculture</option>
                <option @if ('Processing of Agriculture Produce' == ($appForm['sector']?? '')) selected @endif>Processing of Agriculture Produce</option>
                <option @if ('Superfruits/ Superfoods (upstream)' == ($appForm['sector']?? '')) selected @endif>Superfruits/ Superfoods (upstream)</option>
                <option @if ('Superfruits/ Superfoods (downstream)' == ($appForm['sector']?? '')) selected @endif>Superfruits/ Superfoods (downstream)</option>
                <option @if ('Green Technology Services' == ($appForm['sector']?? '')) selected @endif>Green Technology Services</option>
                <option @if ('Halal Industry' == ($appForm['sector']?? '')) selected @endif>Halal Industry</option>
              </optgroup>
              <optgroup label="Petrochemical">
                <option @if ('Petrochemical' == ($appForm['sector']?? '')) selected @endif>Petrochemical</option>
              </optgroup>
              <optgroup label="Services">
                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Tourism">
                  <option @if ('Medical Tourism' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Medical Tourism</option>
                  <option @if ('Hotel Business' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Hotel Business</option>
                  <option @if ('Tourism Project' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Tourism Project</option>
                  <option @if ('Business Tourism' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Business Tourism</option>
                </optgroup>
                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Logistics">
                  <option @if ('Approved Logistic Services' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Approved Logistic Services</option>
                </optgroup>
                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Global Business Services (GBS)">
                  <option @if ('Global Business Services (GBS)' == ($appForm['sector']?? '')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;Global Business Services (GBS)</option>
                </optgroup>
              </optgroup>
              <optgroup label="Others">
                <option @if ('Education' == ($appForm['sector']?? '')) selected @endif>Education</option>
                <option @if ('Research & Development (R&D)' == ($appForm['sector']?? '')) selected @endif>Research & Development (R&D)</option>
                <option @if ('Seed R&D' == ($appForm['sector']?? '')) selected @endif>Seed R&D</option>
                <option @if ('Others' == ((substr($appForm['sector'],0,6)) ?? '')) selected @endif>Others</option>
              </optgroup>
            </select>
          </div>
          <input type="text" class="form-control" id="inputOthers" name="inputOthers" 
          value="{{ (substr($appForm['sector'],0,6)=='Others') ? (substr($appForm['sector'],7)):'' }}"
          placeholder="If choose Others, please specify">
        </div>
      </div>

    </div>

    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success save-btn float-right">Save and Proceed</button>
    </div>
    <!-- /.card-footer -->



  </form>
@endsection

@section('jsscript')
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    /*
    $('.select2').select2()*/

    //Initialize Select2 Elements
    /*$('.select2bs4').select2({
      theme: 'bootstrap4'
    })*/

    $('#incorpdate').datetimepicker({
      format: 'DD-MM-YYYY'
    });

  });


  $("#Equalty1").on('keydown keyup', function(e){
    if(e.keyCode === 189 ){ //keycode for -
      e.preventDefault();
      var str = $(this).val();
      $(this).val(str.replace("-", ""));
    }
    else if ($(this).val() > 100 
        && e.keyCode !== 46 // keycode for delete
        && e.keyCode !== 8 // keycode for backspace
       ) {
        
       e.preventDefault();
       $(this).val(100);
    } 

    $("#Equalty2").val(100 - $(this).val());
  });

  $("#Equalty2").on('keydown keyup', function(e){
    if(e.keyCode === 189 ){
      e.preventDefault();
      var str = $(this).val();
      $(this).val(str.replace("-", ""));
    }
    else if ($(this).val() > 100 
        && e.keyCode !== 46 // keycode for delete
        && e.keyCode !== 8 // keycode for backspace
       ) {
        
       e.preventDefault();
       $(this).val(100);
    } 

    $("#Equalty1").val(100 - $(this).val());
  });
</script>
@endsection