@extends('home.layout.center')
@section('right')
  <div class="right840">
 <div class="title6"><h1><a href="#">信息完善</a></h1><h1><a href="#">修改图像</a></h1><h1><a href="#" class="on">账户安全</a></h1></div>
 <div class="display">
 <table width="840" height="400" align="center" cellspacing="0" cellpadding="0" class="tab">
 <tr><td colspan="2"><font class="f_black">您可以修改您的账户密码。下次登录请使用新密码</font></td></tr>
 <tr>
 <td>&nbsp;&nbsp;&nbsp;<b>当前密码:</b></td><td>&nbsp;&nbsp;&nbsp;<input type="password" class="input1"  name=""/></td>
 </tr>
 <tr>
 <td>&nbsp;&nbsp;&nbsp;<b>新密码:</b></td><td>&nbsp;&nbsp;&nbsp;<input type="password" placeholder="6-18位非空白字符" class="input1 passwd33"  name="a"/>&nbsp;&nbsp;&nbsp;<span class="mmts1"></span></td>
 </tr>
  <tr>
 <td></td>
 <td>
 	<ul class="mmqiangr">
		<li>弱</li>
		<li>中</li>
		<li>强</li>
		<li>牛逼</li>
	</ul>
 </td>
 </tr>
<tr>
 <td style="width:184px">&nbsp;&nbsp;&nbsp;<b>确认新密码:</b></td><td>&nbsp;&nbsp;&nbsp;<input type="password" class="input1 passwd35"  name=""/>&nbsp;&nbsp;&nbsp;<span class="mmts2"></span></td>
 </tr>

 <tr><td></td><td colspan="2">&nbsp;&nbsp;&nbsp;<input type="submit" value="保存密码" class="btn1" />&nbsp;&nbsp;&nbsp;<!-- <input  type="reset" value="重置" class="btn4" /> --></td></tr>
 </table>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
 <script type="text/javascript">
 var jq = $.noConflict(true);
 	var ok1 = false;
 	var ok2 = false;
 	
 	jq('.passwd33').keyup(function(){
 		console.log(jq('.passwd33').val());
 		//验证密码正则表达式
    	var reg = /^\S{6,18}$/;
    	//验证是否为空
	    if(!jq(this).val()){
	      jq('.mmts1').html("<font color='red'>密码不能为空！</font>");
	      ok1 = false;
	    }
	    //验证密码格式是否正确
	    if(reg.test(jq(this).val())){
	      jq('.mmts1').html("<font color='#0c0'>恭喜你，已经会填写密码了！</font>");
	      ok1 = true;
	    }else{
	      jq('.mmts1').html("<font color='red'>密码格式不正确！</font>");
	      ok1 = false;
	    }

	    //判断密码强度

 	});
 </script>
 </div>
 </div>
</div>
@endsection
