<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ env('APP_NAME') }}</title>
  <!-- favicon -->
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Customize style -->
  <link rel="stylesheet" href="{{ asset('css/custom.css?v=1.03') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('img/logo-jomkerja.png') }}" class="brand-image"
           style="opacity: .8; float:unset; max-height:50px"><br/>
      <!--<span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
            <span class="d-block">{{ session('userName') }}</span>
          <!--<a href="#" class="d-block">{{ session('userName') }}</a>-->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
             @if(session('hasForm') == '1') 
            <a href="{{ url('/formSct/1') }}" class="nav-link @if($activeLink==config('enums.applicantSidebarLinks')['FORM']) active @endif">
                <p>
                  Application Form
                </p>
              </a>
              @else
              <a href="{{ url('/appStatus') }}" class="nav-link @if($activeLink==config('enums.applicantSidebarLinks')['APP_STATUS']) active @endif">
                <p>
                  Application Status
                </p>
              </a>
              @endif
            <a href="" class="nav-link @if($activeLink==config('enums.applicantSidebarLinks')['FAQ']) active @endif">
                <p>
                  FAQ
                </p>
              </a>
              <a href="" class="nav-link @if($activeLink==config('enums.applicantSidebarLinks')['CONTACT_US']) active @endif">
                <p>
                  Contact Us
                </p>
              </a>
            <a href="" class="nav-link @if($activeLink==config('enums.applicantSidebarLinks')['ACTION_HIST']) active @endif">
                <p>
                  Action History
                </p>
            </a>
            <a href="{{ url('/logout') }}" class="nav-link">
                <p>
                  Logout
                </p>
              </a>
            <!--<a href="#" class="nav-link active">
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>-->
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="width:unset;">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Moment.js -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script> <!-- dependencies -->
<!-- date-range-picker -->
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<!--<script src="AdminLTE/plugins/select2/js/select2.full.min.js"></script>-->
<!-- InputMask -->
<!--<script src="AdminLTE/plugins/moment/moment.min.js"></script>-->
<!--<script src="AdminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>-->


<!-- Bootstrap Switch -->
<!--<script src="AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>-->
@yield('jsscript')
</body>
</html>
