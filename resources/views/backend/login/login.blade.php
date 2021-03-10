
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="{{url('/backend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/style.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1><b>Admin</b>Shop</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    
  <form action="{{route('postLogin')}}" method="post">
    @csrf
      <div class="form-group has-feedback">
      <input type="text" class="form-control" name="usename" placeholder="Tên tài khoản" value="{{old('usename')}}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('usename'))
           <p class="text-danger">{{ $errors->first('usename') }}</p>
        @endif
        @if (Session::has('error'))
      <p class="text-danger">{{Session::get('error')}}</p>
    @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
           <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-1"></div>
        <div class="col-xs-6">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" value="remember">
            Remember Me
          </label>
        </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>


<script src="{{url('/backend')}}/js/jquery.min.js"></script>
<script src="{{url('/backend')}}/js/bootstrap.min.js"></script>
<script src="{{url('/backend')}}/js/adminlte.min.js"></script>
<script>

</script>
</body>
</html>
