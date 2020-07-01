@extends('master')

@section('content')
<section class="content">
<h5 class="mt-4 mb-2">Application Form</h5>

<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">@yield('tabTitle')</h3>
        <ul class="nav nav-pills ml-auto p-2">
            <!-- <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Sect 1</a></li> -->
        @for ($i = 1; $i < 8; $i++)
          <li class="nav-item"> 
            @if ($activeSct == $i)
              <a class="nav-link active" href="#">Sect {{$i}}</a>
            @elseif ($loadData['sect_progress'] >= $i)
              <a class="nav-link" href="{{ url('/formSct/'.$i) }}">Sect {{$i}}</a>
            @else
              <div title="please complete your current section">
              <a class="nav-link disabled"  href="">Sect {{$i}}</a>
              </div>
            @endif
            </li>
        @endfor
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @yield('sectBody')
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- ./card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- END CUSTOM TABS -->
</section>
@endsection