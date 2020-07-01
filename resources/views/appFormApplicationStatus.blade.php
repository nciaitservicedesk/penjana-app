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
            <td class="tdtextboxalign"><input type="text" class="text-sm-left border-0" id="appremark" name="appremark" 
              style="width:300px"  readonly="readonly" value="{{ $appStatus['remark'] ?? '' }}"></td>
          </tr>
        </thead>
      </table>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!--<button type="submit" class="btn btn-success float-right">Approval Letter</button>-->
  </div>
  <!-- /.card-footer -->

</section>
@endsection


















