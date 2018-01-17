<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/homes/login_register/css/style.css" />
    <!--[if IE 6]>
    <script src="/homes/login_register/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/homes/login_register/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/homes/login_register/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/homes/login_register/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/menu.js"></script>    
        
	<script type="text/javascript" src="/homes/login_register/js/select.js"></script>
    
	<script type="text/javascript" src="/homes/login_register/js/lrscroll.js"></script>
  <script type="text/javascript" src="/layer/layer.js"></script>
    
    <script type="text/javascript" src="/homes/login_register/js/iban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/fban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/f_ban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/mban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/bban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/hban.js"></script>
    <script type="text/javascript" src="/homes/login_register/js/tban.js"></script>
    
	<script type="text/javascript" src="/homes/login_register/js/lrscroll_1.js"></script>
    
    
<title>Login</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好，请<a href="Login.html">登录</a>&nbsp; <a href="/register" style="color:#ff4e00;">免费注册</a></span>
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
	<div class="login">
    	<div class="log_img" style="margin-top:0"><img src="/homes/login_register/images/l_img.png" width="611" height="425" /></div>
		<div class="log_c" style="height:450px;margin-top:0">
        	<form>
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span id="qiehuan1" class="fl qiehuan" style="font-size:24px;line-height:30px;margin-right:80px;border-bottom:2px solid red;cursor:pointer;color:red">账号登录</span>
                  <span id="qiehuan2" class="fl qiehuan" style="font-size:24px;line-height:30px;;cursor:pointer">手机登录</span>
                </td>
              </tr>

              <tr class="qieh4" height="70">
                <td>账&nbsp; &nbsp;号</td>
                <td><input type="text" value="" name="abcd1" class="l_user l_userbd l_llla" placeholder="用户名/手机号" /></td>
              </tr>
              <tr class="qieh4" height="70">
                <td>密&nbsp; &nbsp;码</td>
                <td><input type="password" value="" name="abcd2" class="l_pwd l_llla" /></td>
              </tr>

              <tr class="qieh5" style="display:none" height="70">
                <td>手机号</td>
                <td><input style="background:url(/homes/login_register/images/i_tel.png) no-repeat 285px center" placeholder="请输入您的手机号" type="text" value="" name="abcd3" class="l_user l_userjb" /></td>
              </tr>
              <tr class="qieh5" style="display:none" height="70">
                <td>校验码</td>
                <td><input style="width:152px;" type="text" value="" name="abcd4" class="l_pwd jiaoyanm" /><button type="button" id="alidayu" style="height:39px;width:115px">获取校验码</button></td>
              </tr>

              <tr style="display:table-row" height="70">
                <td>验证码</td>
                <td>
                    <input type="text" value="" class="l_ipt l_ipt1 l_llla" />
                    <span class="dianhuan1" style="display:inline-block;font-size:12px; font-family:'宋体';cursor:pointer">换一张</span>
                    <img class="djbd dianhuan1" src="/create_code/1" style="vertical-align: middle;"/>               
                </td>
                <script type="text/javascript">
                  $('.dianhuan1').click(function(){
                    $('.djbd').attr('src','/create_code/'+Math.ceil(Math.random()*1000));
                  });
                </script>
              </tr>

              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" /></label><label class="r_txt">请保存我这次的登录信息</label>
                    </span>
                    <span class="fr"><a href="#" style="color:#ff4e00;">忘记密码</a></span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td class="log_mima"><input type="button" value="登录" class="log_btn l_mima" /></td>
                <td style="display:none" class="log_phone"><input type="button" value="登录" class="log_btn l_phonema" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    //登录选项卡
    $('#qiehuan1').click(function(){
      $(this).css({borderBottom:'2px solid red',color:'red'});
      $('#qiehuan2').css({borderBottom:'none',color:'#000'});
      $('.qieh4').css({display:'table-row'});
      $('.qieh5').css({display:'none'});
      $('.log_mima').css({display:'table-cell'});
      $('.log_phone').css({display:'none'});
    });

    $('#qiehuan2').click(function(){
      $(this).css({borderBottom:'2px solid red',color:'red'});
      $('#qiehuan1').css({borderBottom:'none',color:'#000'});
      $('.qieh4').css({display:'none'});
      $('.qieh5').css({display:'table-row'});
      $('.log_mima').css({display:'none'});
      $('.log_phone').css({display:'table-cell'});
    });
    /*选项卡结束*/

    /*账号登录开始!!!!*/
    //执行账号登录
    var ok1 = false;
    var ok2 = false;
    // var ok3 = false;

    $('.l_llla').eq(0).blur(function(){
      if(!$(this).val())
      {
        layer.tips('账号不能为空！', $('.l_llla').eq(0), {
          tips: [2,'red']
        });
        ok1 = false;
      }else{
        ok1 = true;
      }
    });

    $('.l_llla').eq(1).blur(function(){
      if(!$(this).val()){
        layer.tips('密码不能为空！', $('.l_llla').eq(1), {
          tips: [2,'red']
        });
        ok2 = false;
      }else{
        ok2 = true;
      }
    });

    // $('.l_llla').eq(2).blur(function(){
    //   if(!$(this).val()){
    //     layer.tips('验证码不能为空！', $('.l_llla').eq(2), {
    //       tips: [2,'red']
    //     });
    //     ok3 = false;
    //   }else{
    //     ok3 = true;
    //   }
    // });

    $('.l_mima').click(function(){
      var user = $('input[name="abcd1"]').val();
      var pass = $('input[name="abcd2"]').val();
      var code = $('.l_ipt1').val();

      $('.l_llla').trigger('blur');
      if(ok1 && ok2)
      {
        $.post('/do_login',{user:user,pass:pass,code:code,'_token':'{{csrf_token()}}'},function(msg){
        //判断执行登录情况
        switch(msg){
          case '1':  //手机未注册
            layer.confirm('该账号还未注册，是否去注册？', {
              btn: ['确定','取消'] //按钮
            }, function(){
              window.location.href = "/register";
            }, function(){
            });
            break;
          case '2':  //登录成功
            layer.alert('恭喜您，登录成功！', {
              icon: 6,
              skin: 'layer-ext-moon'
            },function(){
              window.location.href = '/';
            });
            break;
          case '3':  //密码错误
            layer.alert('密码错误！', {
              icon: 5,
              skin: 'layer-ext-moon' 
            });
            break;
          case '4':  //验证码错误
            layer.alert('验证码错误！', {
              icon: 5,
              skin: 'layer-ext-moon' 
            });
            break;
          }
        });
      }else{
        layer.msg('请正确填写登录信息！');
        return false;
      }  
    });
    /*账号登录结束!!!!*/


    /*发送验证码alidayu登录开始!!!*/
    //检测手机号格式
    function phone_test()
    {
      var phone = $('input[name="abcd3"]').val();
      //验证手机正则表达式
      var reg = /^[1][0-9]{10}$/;
      //验证是否为空
      if(!phone)
      {
        layer.tips('手机号不能为空！', '.l_userjb', {
          tips: [2,'red']
        });
        return false;
      }
      //验证手机格式是否正确
      if(!reg.test(phone))
      {
        layer.tips('手机号格式不正确！', '.l_userjb', {
          tips: [2,'red']
        });
        return false;
      }
      //检测手机号是否注册
      var p_test;
      $.ajax({
        type: "POST",
        url: "/test_phone",
        async: false,
        data: "phone="+phone+"&_token={{csrf_token()}}",
        success: function(msg){
         if(msg == '2')
           {          
             p_test = 2; //手机号未注册
           }
        }
      });
      //判断手机号是否注册
      if(p_test == 2){
        layer.confirm('该手机还未注册，是否去注册？', {
          btn: ['确定','取消'] //按钮
        }, function(){
          window.location.href = "/register";
        }, function(){
        });
        return false;
      }
      return phone;
    }

    //验证码输入框验证
    function test_code()
    {
      var code = $('.l_llla').eq(2).val();
      //验证码是否为空
      if(!code)
      {
        layer.tips('验证码不能为空！', $('.l_llla').eq(2), {
          tips: [2,'red']
        });
        return false;
      }

      // if(code != cod)
      // {
      //   layer.tips('验证码错误！', $('.l_llla').eq(2), {
      //     tips: [2,'red']
      //   });
      //   return false;
      // }

      return code;
    }

    //阿里大鱼
    $('#alidayu').click(function(){
      //检测手机号
      var res = phone_test();
      if(!res)
      {
        return false;
      }

      //设定倒计时按钮
      var count = 60; //设定最短发送时间
      var countdown = setInterval(CountDown, 1000);
      CountDown(); 
      function CountDown() {
        $("#alidayu").attr("disabled", true);
        $("#alidayu").text("重新发送（" + count + "）");
        if (count == 0) {
            $("#alidayu").text("获取校验码").removeAttr("disabled");
            clearInterval(countdown);
        }
        count--;
       }

       //发送ajax,发送短信验证码
       $.post('/alidayu',{phone:res,_token:"{{csrf_token()}}"},function(msg){
       });
    });

    //执行手机验证码登录
    $('.l_phonema').click(function()
    {     
      var p_code = $('.jiaoyanm').val();
      if(!p_code)
      {
        layer.tips('校验码不能为空！', $('#alidayu'), {
          tips: [2,'red']
        });
      }
      var res_code = test_code(); //结果为验证码
      var phone = phone_test();
      if(p_code && phone && res_code)
      {
        //执行登录
        $.post('/phone_login',{phone:phone,p_code:p_code,code:res_code,_token:'{{csrf_token()}}'},function(msg){
          switch(msg)
          {
            case '1': //手机号未注册
              layer.confirm('该手机还未注册，是否去注册？', {
                btn: ['确定','取消'] //按钮
              }, function(){
                window.location.href = "/register";
              }, function(){
              });
              break;
            case '2': //校验码错误
              layer.msg('手机校验码错误!');
              break;
            case '3':
              layer.msg('验证码错误!');
              break;
            case '4':
              layer.alert('恭喜您，登录成功！', {
                icon: 6,
                skin: 'layer-ext-moon'
              },function(){
                window.location.href = '/';
              });
              break;
          }
        });
      }
    });
</script>

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