<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ env('APP_NAME') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Customize style -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('img/logo-jomkerja.png') }}" class="brand-image" style="max-width:250px"><br/>
    <!--<a><b>{{ env('APP_NAME') }}</b></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset your password</p>

      <form action="{{ url('/resetPass') }}" method="post">
        @csrf
        <span class="text-danger" for="pass">
          @isset($errMsg['pass'])
            {{$errMsg['pass']}}
          @endisset
        </span>
        <div class="input-group mb-3">
          <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" for="pass2">
          @isset($errMsg['pass2'])
            {{$errMsg['pass2']}}
          @endisset
        </span>
        <div class="input-group mb-3">
            <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Re-type Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary save-btn btn-block">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-0">
      <a href="{{ url('/signUp') }}" class="text-center">Register a new account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- modal -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @isset($alertMsg)
          <p>{{ $alertMsg }}</p>
        @endisset
        
      </div>
      <div class="modal-footer justify-content-end"> <!-- class="modal-footer justify-content-between" -->
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <a href="{{url('/login')}}"> <button type="button" class="btn btn-primary">OK</button> </a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!--<script src="AdminLTE/dist/js/adminlte.min.js"></script>-->

<script type="text/javascript">
@isset($alertMsg)
  $('#modal-default').modal('show')
@endisset
</script>
</body>
</html>
