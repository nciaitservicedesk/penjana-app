@extends('adminMaster')

@section('content')
<section class="content">

  <!-- Application Status tittle--> 
<h5 class="mt-4 mb-2">Application List</h5>
  <div class="card-body">

    <!-- Company Name -->
    <!--<div class="form-group row">
      <label for="inputCompName" class="col-sm-3 col-form-label">Company Name/ Applicant</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputCompName" name="inputCompName" 
      placeholder="Company Name/ Applicant" value="{{ $previewData['sect1']['co_name'] ?? '' }}" readonly="readonly">
      </div>
    </div> -->

    <!-- SSMNumber -->
    <!--
    <div class="form-group row">
      <label for="inputSSMno" class="col-sm-3 col-form-label">SSM Registration Number</label>
      <div class="col-sm-9">
      <input type="text" class="form-control" id="inputSSMno" name="inputSSMno" 
      placeholder="SSM Registration Number" value="{{ $previewData['sect1']['ssm_no'] ?? '' }}" readonly="readonly">
      </div>
      </div>-->

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>

      <table class="table display compact cell-border stripe table-bordered" id="example" >
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th class="thalign"  scope="col">Ref No.</th>
            <th class="thalign"  scope="col">Company Name</th>
            <th class="thalign"  scope="col">SSM</th>
            <th class="thalign"  scope="col">Sector</th>
            <th class="thalign"  scope="col">Status</th>
            <th class="thalign"  scope="col">Officer in Charge</th>
            <th class="thalign"  scope="col">Submission Date</th>
            <th class="thalign"  scope="col">Days Left</th>
            <th class="thalign" style="width: 10%" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if (count($tblData) > 0)
          @foreach ($tblData as $tmp)
          <tr>
          <th></th>
          <td>{{ $tmp['ref_no'] }}</td>
          <td>{{ $tmp['co_name'] }}</td>
          <td>{{ $tmp['ssm_no'] }}</td>
          <td>{{ $tmp['sector'] }}</td>
          <td>{{ $tmp['status_name'] }}</td>
          <td>{{ $tmp['officer_name'] }}</td>
          <td>{{ $tmp['submission_date'] }}</td>
          <td>{{ $tmp['day_left'] }}</td>
          <td>

            <a href="{{ url('officer/viewDetail/'.$tmp['app_id']) }}">
              @if ($tmp['required_action'] == '1')
              <input type="button" value="Action"/>
              @else
              <input type="button" value="View"/>
              @endif
            </a>

            <a href="{{ url('officer/viewAudit/'.$tmp['app_id']) }}">
              <input type="button" value="View Audit"/>
            </a>

          </td>
        </tr>
          @endforeach
          @else
            <td colspan="9">No record found!</td>
          @endif
        </tbody>
        <!--
        <tfoot>
          <tr>
            <th>#</th>
            {{-- <th class="thalign"  scope="col">Company</th>
            <th class="thalign"  scope="col">SSM No.</th> --}}
            <th class="thalign"  scope="col">Industry</th>
            <th class="thalign"  scope="col">Sector</th>
            <th class="thalign"  scope="col">Officer In Charge</th>
            <th class="thalign"  scope="col">Status</th>
            <th class="thalign"  scope="col">Days Left</th>
            <th class="thalign" style="width: 15%" scope="col"></th>
          </tr>
        </tfoot> -->
      </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!--<button type="submit" class="btn btn-success float-right">Approval Letter</button>-->
  </div>
  <!-- /.card-footer -->

</section>
@endsection

@section('jsscript')
<script>
  $(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ 
          { "orderable": false, "targets": [-1,0] },
                      ],

        "fixedHeader": {
            header: true,
            footer: false
        }

        
        
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>

@endsection


















