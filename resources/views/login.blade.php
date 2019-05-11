<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Quản lý bảo hành</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập vào hệ thống</p>

    <form action="{{route('login_post')}}" method="post" id="login_form">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" id="username" name="username">
        <span class="form-control-feedback">
        <i class="fa fa-user"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
            <label>
              <input type="checkbox" name="remember"> Lưu mật khẩu
            </label>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<script>
  $('#login_form').submit(function(e){
      e.preventDefault(); //chặn lại ko cho submit theo kiểu thông thường mà dùng ajax submit
      dataString = $(this).serialize(); //lấy về tất cả dữ liệu trên form
      $.ajax({
        type: 'post',
        url: "{{route('login_post')}}",
        data: dataString,
        success: function(result){
          if(result.length>1)
            alert("thông tin đăng nhập không chính xác");
          else
            window.location.href="{{route('index')}}";
        },
        dataType: "text"
      });
    });
</script>
</body>
</html>
