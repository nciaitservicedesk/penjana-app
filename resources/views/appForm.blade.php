@extends('master')

@section('content')
<h5 class="mt-4 mb-2">Application Form</h5>

<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">This is title for section @yield('tabTitle')</h3>
        <ul class="nav nav-pills ml-auto p-2">
            <!-- <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Sect 1</a></li> -->
          <li class="nav-item"><a class="nav-link active" href="#tab_1">Sect 1</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_2">Sect 2</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3">Sect 3</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_4">Sect 4</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_5">Sect 5</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_6">Sect 6</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_7">Sect 7</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @yield('sect1')
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            The European languages are members of the same family. Their separate existence is a myth.
            For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
            in their grammar, their pronunciation and their most common words. Everyone realizes why a
            new common language would be desirable: one could refuse to pay expensive translators. To
            achieve this, it would be necessary to have uniform grammar, pronunciation and more common
            words. If several languages coalesce, the grammar of the resulting language is more simple
            and regular than that of the individual languages.
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
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
@endsection