@extends('layout.admin')
@section('content')
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
@end
