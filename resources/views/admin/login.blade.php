<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>网站后台</title>
  <link rel="stylesheet" type="text/css" href="/admins/css/admin_login.css"/>
</head>
<body>
<div class="admin_login_wrap">
    <div class="adming_login_border">
        <div style="text-align:center">
          <h1><b><font color="black">视频网站后台</font></b></h1>
          <div>
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
        </div>
        <div class="admin_input">
            <form action="{{url('/admin/login')}}" method="POST">
            {{csrf_field()}}
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="{{old('username')}}" id="user" size="40" class="admin_input_style" placeholder='请输入用户名' />
                    </li>
                    <li>
                        <label for="password">密码：</label>
                        <input type="password" name="password" value="" id="password" size="40" class="admin_input_style" placeholder='请输入密码'/>
                    </li>
                    <li style="position: relative;">
                        <label for="code">验证码：</label>
                        <input type="text" name="code" value="" id="code" size="15" class="admin_input_style" placeholder='请输入验证码'/>
                        <img src="/admin/login/create_code/1" style="position: absolute;"/>
                        <span onclick="change($(this))" style="display:inline-block;position: absolute;right: 0;bottom: 0;font-size:12px; font-family:'宋体';cursor:pointer">换一张</span>
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#" target="_blank">进入前台</a> &copy; 2016 Powered by <a href="#" target="_blank">你的大名</a></p>
</div>
<script src="/admins/js/jquery.min.js"></script>
<script type="text/javascript">
    function change(obj){
      obj.parent().find('img').attr('src','/admin/login/create_code/'+Math.ceil(Math.random()*1000));
                  
    }
</script>
</body>
</html>
