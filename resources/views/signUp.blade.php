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
   <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a><b>{{ env('APP_NAME') }}</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>

      <form action="{{ url('/signUp') }}" method="post">
        @csrf
        <span class="text-danger" for="txtName">
          @isset($errMsg['name'])
            {{$errMsg['name']}}
          @endisset
        </span>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" maxlength="20"
           id="txtName" name="txtName" value="{{ old('txtName') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" for="txtEmail">
          @isset($errMsg['email'])
            {{$errMsg['email']}}
          @endisset
        </span>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" maxlength="40"
           id="txtEmail" name="txtEmail" value="{{ old('txtEmail') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" for="txtPass">
          @isset($errMsg['pass'])
            {{$errMsg['pass']}}
          @endisset
        </span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="txtPass" name="txtPass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" for="txtPass2">
          @isset($errMsg['pass2'])
            {{$errMsg['pass2']}}
          @endisset
        </span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" id="txtPass2" name="txtPass2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    <a href="{{ url('/login') }}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<!--<script src="../../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<!--<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- AdminLTE App -->
<!--<script src="../../dist/js/adminlte.min.js"></script>-->
</body>
</html>
