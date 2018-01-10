<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/admins/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/admins/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/admins/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admins/css/admin.css">
    <link rel="stylesheet" href="/admins/css/app.css">
    <script src="/admins/js/echarts.min.js"></script>
    <script src="/admins/js/jquery.min.js"></script>
    <script src="/admins/js/amazeui.min.js"></script>
    <script src="/admins/js/iscroll.js"></script>
    <script src="/admins/js/app.js"></script>
</head>
<body>
  <div class="am-g myapp-login">
 
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				Amaze UI<span> 登录</span> <i class="am-icon-skyatlas"></i>
				 
			</div>
      

		<div class="login-font">
			 @if (count($errors) > 0)
        <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="color:red;">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if (session('error'))
        <p style="color:red"> {{ session('error') }}</p>
      @endif
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" action="/admin/login" method="POST">
      {{csrf_field()}}
				<fieldset>
					<div class="am-form-group">
						<input type="text" name="phone" value="{{ old('phone') }}"  placeholder="输入手机号码">
					</div>
          <!-- <div style="position:relative;">
            <input type="text" name="code" value="{{ old('code') }}" placeholder="输入验证码" >
            <img src="/code/code.php" alt="" onclick="this.src='/code/code.php?id='+Math.random()" style="display:block;position:absolute;right:0;top:0;height:42px;"> 
          </div> -->
					<div class="am-form-group">
						<input type="password" name='password' placeholder="请输入密码">
					</div>
					<p><button type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>
</body>
</html>
