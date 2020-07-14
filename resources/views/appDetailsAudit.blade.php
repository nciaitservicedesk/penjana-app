@extends('adminMaster')

@section('content')
<section class="content">
  <!-- Application Status tittle--> 
<h5 class="mt-4 mb-2">Application Audit Trails</h5>
  <div class="card-body">
    <a href="{{ url('/officer/appList') }}">
    <input type="button" id="btnback1" name="btnback1" value="&laquo;back" class="btn btn-light hBack"/>
    </a>
    <h4>{{ $appForm['ref_no'] }}</h4>
    <br/><br/>
    <table class="table display compact cell-border stripe table-bordered" id="tblAudit" align="center" style="width:600px" >
      <thead>
        <tr>
          <th>
            State
          </th>
          <th>
            Approved Pax
          </th>
          <th>
            Approved Fund
          </th>
          <th>
            Responsible Officer
          </th>
          <th>
            Recommendation / Decision
          </th>
          <th>
            Comment
          </th>
          <th>
            Timestamp
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $row)
        <tr>
          <td>{{$row->name}}</td>
          <td>{{$row->approved_pax}}</td>
          <td>{{$row->approved_fund}}</td>
          <td>{{$row->by_name}}</td>
          <td>{{$row->action}}</td>
          <td>{{$row->comment ?? ''}}</td>
          <td>{{$row->action_date}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a href="{{ url('/officer/appList') }}">
      <input type="button" id="btnback2" name="btnback" value="&laquo;back" class="btn btn-light hBack"/>
    </a>
  </div>
  <!-- /.card-footer -->

</section>
@endsection
@section('jsscript2')
<script>
  
  $(document).ready(function() {
    var t = $('#tblAudit').DataTable( {
        "columnDefs": [ 
          { "orderable": false, "targets": [-1,0] }
                      ],

        "fixedHeader": {
            header: true,
            footer: false
        }
        {

        
        
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
@endsection














