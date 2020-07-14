@extends('master')

@section('content')
<section class="content">
  <!-- Application Status tittle--> 
<h5 class="mt-4 mb-2">Application Status</h5>
  <div class="card-body">

      <!-- Application Status table--> 
       <table class="table table-bordered table-sm" align="center" style="width:600px" >
        <thead>
          <tr>
            <th class="thcalculate" scope="col">Reference No.</th>
            <td class="tdtextboxalign"><input type="text" class="text-sm-left border-0" id="appreferenceno" name="appreferenceno" 
              style="width:300px"  readonly="readonly" value="{{ $appStatus['refNo'] ?? '' }}"></td>
          </tr>
          <tr>
            <th class="thcalculate" scope="col">Status</th>
            <td class="tdtextboxalign"><input type="text" class="text-sm-left border-0" id="appstatus" name="appstatus" 
              style="width:300px" readonly="readonly" value="{{ $appStatus['status'] ?? '' }}"></td>
          </tr>
          <tr>
            <th class="thcalculate" scope="col">Remark</th>
            <td class="tdtextboxalign">
              <textarea name="Text1" cols="40" class="text-sm-left border-0" rows="5" readonly>{{ $appStatus['remark'] ?? '' }}</textarea>
              <!--<input type="text" rows="5"  class="text-sm-left border-0" id="appremark" name="appremark" 
              style="width:300px"  readonly="readonly" value="">-->
            </td>
          </tr>
        </thead>
      </table>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>
      @isset ($appStatus['expiredMsg'])
      <div class="form-group row">
        <p>{{ $appStatus['expiredMsg'] }}</p>
      </div>
      @endisset

      @if ($appStatus['showAcceptance'] == '1')
      <form method="post" action="{{ url('/appStatus') }}">
        @csrf
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="chkTnc" name="chkTnc" value="checked" />
        <label for="chkTnc" class="custom-control-label">
        We are pleased to inform you that your online application dated {{date( "d-m-Y",strtotime($appStatus['submissionDate'])) }} has been approved. 
        Please check the checkbox to accept this offer within seven (7) days from the approval date ({{$appStatus['approvalDate']}}). 
        Failure to accept within the prescribed time will render this offer as lapse automatically. Offer Expired on {{ $appStatus['expiryDate'] }}.
        </label>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>
        <button type="submit" class="btn btn-success save-btn float-right">Save and Proceed</button>
      </div>
    </form>
        
      @endif
      @if ($appStatus['showLetter'] == '1')
      <iframe src="{{asset($appStatus['letter_path'].'/'.$appStatus['letter_file']) }}" width="100%" height="800px" >
      </iframe>
      @endif
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    @if ($appStatus['showAppeal'] == '1')
      <a href="{{ url('/appeal') }}"> <button type="button" class="btn save-btn btn-success float-right">Appeal</button></a>
    @endif
  </div>
  <!-- /.card-footer -->

</section>
@endsection


















