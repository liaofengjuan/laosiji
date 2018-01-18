<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="_token" content="{{ csrf_token() }}"/> -->
	<link type="text/css" rel="stylesheet" href="/homes/login_register/css/style.css" />
    <!--[if IE 6]>
    <script src="/homes/login_register/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/homes/login_register/js/jquery-1.11.1.min_044d0927.js"></script>
  <script type="text/javascript" src="/homes/login_register/js/jquery.bxslider_e88acd1b.js"></script>
	<script type="text/javascript" src="/layer/layer.js"></script>
    
    <script type="text/javascript" src="/homes/login_register/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/menu.js"></script>    
        
	<script type="text/javascript" src="/homes/login_register/js/select.js"></script>
    
	<script type="text/javascript" src="/homes/login_register/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/homes/login_register/js/iban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/fban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/f_ban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/mban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/bban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/hban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/tban.js"></script>
    
	<script type="text/javascript" src="/homes/login_register/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好，请<a href="#">登录</a>&nbsp; <a href="#" style="color:#ff4e00;">免费注册</a></span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/homes/login_register/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/homes/login_register/images/logo.png" /></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/homes/login_register/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c" style="height:500px">
        	<form>
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" class="l_tel" name="phone" /></td>
              </tr>
              <tr height="18">
                <td align="right"><font color="#ff4e00"></font></td>
                <td id="bd_1" style="font-size:10px;line-height:10px"></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" name="password" placeholder="6-18位非空白字符" /></td>
              </tr>
              <tr height="18">
                <td align="right"><font color="#ff4e00"></font></td>
                <td id="bd_2" style="font-size:10px;line-height:10px"></td>
              </tr>
             <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" /></td>
              </tr>
              <tr height="18">
                <td align="right"><font color="#ff4e00"></font></td>
                <td id="bd_3" style="font-size:10px;line-height:10px"></td>
              </tr>
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_ipt djbd12" />
                    <span class="dianhuan" style="display:inline-block;font-size:12px; font-family:'宋体';cursor:pointer">换一张</span>
                    <img class="djbd dianhuan" src="/create_code/2" style="vertical-align: middle;"/>
                    <script type="text/javascript">
                      $('.dianhuan').click(function(){
                        $('.djbd').attr('src','/create_code/'+Math.ceil(Math.random()*1000));
                      });
                    </script>
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input id="chedd" type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="button" value="立即注册" class="log_btn" /></td>
              </tr>
            </table>
            </form>
<script type="text/javascript">

  //表单验证
  var ok1 = false;
  var ok2 = false;
  var ok3 = false;

  //验证手机号
  $('.l_tel').blur(function(){
    //验证手机正则表达式
    var reg = /^[1][0-9]{10}$/;
    //验证是否为空
    if(!$(this).val()){
      $('#bd_1').html("<font color='red'>手机号不能为空！</font>");
      ok1 = false;
    }
    //验证手机格式是否正确
    if(reg.test($(this).val())){
      $('#bd_1').html("<font color='#0c0'>恭喜你，已经会填写手机号了！</font>");
      ok1 = true;
    }else{
      $('#bd_1').html("<font color='red'>手机号格式不正确！</font>");
      ok1 = false;
    }
  }).keyup(function(){
    $(this).triggerHandler('blur');
  });

  //验证密码
  $('.l_pwd').eq(0).blur(function(){
    //验证密码正则表达式
    var reg = /^\S{6,18}$/;
    //验证是否为空
    if(!$(this).val()){
      $('#bd_2').html("<font color='red'>密码不能为空！</font>");
      ok2 = false;
    }
    //验证密码格式是否正确
    if(reg.test($(this).val())){
      $('#bd_2').html("<font color='#0c0'>恭喜你，已经会填写密码了！</font>");
      ok2 = true;
    }else{
      $('#bd_2').html("<font color='red'>密码格式不正确！</font>");
      ok2 = false;
    }
  }).keyup(function(){
    $(this).triggerHandler('blur');
  });

  //验证确认密码
  $('.l_pwd').eq(1).blur(function(){
    //验证是否为空
    if(!$(this).val()){
      $('#bd_3').html("<font color='red'>密码不能为空！</font>");
      ok3 = false;
      return false;
    }
    //验证两次输入的密码是否一致
    if($(this).val() != $('.l_pwd').eq(0).val()){
      $('#bd_3').html("<font color='red'>两次输入密码不一致！</font>");
      ok3 = false;
    }else{
      $('#bd_3').html("<font color='#0c0'>恭喜你，已经能连续输俩密码了！</font>");
      ok3 = true;
    }
  }).keyup(function(){
    $(this).triggerHandler('blur');
  });

  //执行注册
  $('input[type="button"]').click(function(){
    //用户协议
    if(!$('#chedd').prop('checked')){
      layer.msg('请阅读用户协议并同意！');
      return false;
    }
    //进行总验证
    $('.l_tel,.l_pwd').trigger('blur');
    if(ok1 && ok2 && ok3){
        var phone = $('.l_tel').val();
        var pass = $('.l_pwd').val();
        var code = $('.djbd12').val();

        $.post('/register/doregister',{'phone':phone,'pass':pass,code:code,'_token':'{{ csrf_token() }}'},function(msg){
          // console.log(msg);
          switch(msg){
            case '2': //该手机号已被注册
              layer.msg('该手机号码已被注册！');
              break;
            case '1': //注册成功
              layer.alert('注册成功！', {
                icon: 6,
                skin: 'layer-ext-moon'
              },function(){
                window.location.href = '/login';
              });
              break;
            case '3': //失败
              layer.alert('找管理员去吧,出幺蛾子了！', {
                icon: 5,
                skin: 'layer-ext-moon' 
              });
              break;
            case '4':
              layer.alert('验证码错误!', {
                icon: 5,
                skin: 'layer-ext-moon' 
              });
              break;
            default: //失败
              layer.msg('注册失败！');
              break;
          }
        });
    }else{
        layer.msg('请正确填写注册信息！');
        return false;
    }
  });
  
</script>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/homes/login_register/images/b_1.gif" width="98" height="33" /><img src="/homes/login_register/images/b_2.gif" width="98" height="33" /><img src="/homes/login_register/images/b_3.gif" width="98" height="33" /><img src="/homes/login_register/images/b_4.gif" width="98" height="33" /><img src="/homes/login_register/images/b_5.gif" width="98" height="33" /><img src="/homes/login_register/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End -->    

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
