@extends('home.layout.center')
@section('right')
  <div class="right840">
 <div class="title6"><h1><a href="/center/self">信息完善</a></h1><h1><a href="/center/self/sc">修改头像</a></h1><h1><a href="#" class="on">账户安全</a></h1></div>
 <div class="display">
 <table width="840" height="400" align="center" cellspacing="0" cellpadding="0" class="tab">
 <tr><td colspan="2"><font class="f_black">您可以修改您的账户密码。下次登录请使用新密码</font></td></tr>
 <tr>
 <td>&nbsp;&nbsp;&nbsp;<b>当前密码:</b></td><td>&nbsp;&nbsp;&nbsp;<input id="yuanmm24" type="password" class="input1"  name=""/>&nbsp;&nbsp;&nbsp;<span class="mmts2"></span></td>
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
 <td style="width:184px">&nbsp;&nbsp;&nbsp;<b>确认新密码:</b></td><td>&nbsp;&nbsp;&nbsp;<input type="password" class="input1 passwd35"  name=""/>&nbsp;&nbsp;&nbsp;<span class="mmts3"></span></td>
 </tr>

 <tr><td></td><td colspan="2">&nbsp;&nbsp;&nbsp;<input type="submit" value="保存密码" class="btn1 btn1sub" />&nbsp;&nbsp;&nbsp;<!-- <input  type="reset" value="重置" class="btn4" /> --></td></tr>
 </table>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

 <script type="text/javascript">
 	var jq = $.noConflict(true);
 	var ok1 = false;
 	var ok2 = false;
 	var ok3 = false;
 	//验证老密码
 	jq('#yuanmm24').blur(function(){
 		//验证是否为空
	    if(!jq(this).val())
	    {
	      jq('.mmts2').html("<font color='red'>密码不能为空！</font>");
	      ok2 = false;
	      return;
	    }
	    jq('.mmts2').html("");
	    ok2 = true;
 	});

 	//新密码验证
 	jq('.passwd33').keyup(function(){
 		// console.log(jq('.passwd33').val());
 		//验证密码正则表达式
    	var reg = /^\S{6,18}$/;
    	//验证是否为空
	    if(!jq(this).val())
	    {
	      jq('.mmts1').html("<font color='red'>密码不能为空！</font>");
	      ok1 = false;
	    }
	    //验证密码格式是否正确
	    if(reg.test(jq(this).val()))
	    {
	      jq('.mmts1').html("<font color='#0c0'>恭喜你，已经会填写密码了！</font>");
	      ok1 = true;
	    }else{
	      jq('.mmts1').html("<font color='red'>密码格式不正确！</font>");
	      ok1 = false;
	    }

	    //判断密码强度
	    var preg1 = /[0-9]/g; //纯数字
		var preg2= /[a-z]/g;//小写字母
		var preg3= /[A-Z]/g;//大写字母
		var preg4= /[\W_]/g;//特殊字母
		var li = jq('.mmqiangr li');

		var arr = [];
		if(preg1.test(jq(this).val()))
		{
			arr.push('数字');
		}
		if(preg2.test(jq(this).val()))
		{
			arr.push('小写字母');
		}
		if(preg3.test(jq(this).val()))
		{
			arr.push('大写字母');
		}
		if(preg4.test(jq(this).val()))
		{
			arr.push('特殊字母');
		}
		//改变所有标签样式
		for(var i = 0;i<li.length;i++)
		{
			li[i].style.background = '#ccc';
		}
		// 让指定的li标签 添加样式
		switch(arr.length)
		{
			case 1:
				li.eq(0).css('background','red');
				break;
			case 2:
				li.eq(1).css('background','orange');
				break;
			case 3:
				li.eq(2).css('background','yellowgreen');
				break;
			case 4:
				li.eq(3).css('background','black');
				break;
		}
 	}).blur(function(){
	    jq(this).triggerHandler('keyup');
	});


	//验证确认密码
 	 jq('.passwd35').blur(function(){
	    //验证是否为空
		if(!jq(this).val()){
		  jq('.mmts3').html("<font color='red'>密码不能为空！</font>");
		  ok3 = false;
		  return false;
		}
		//验证两次输入的密码是否一致
		if(jq(this).val() != jq('.passwd33').val()){
		  jq('.mmts3').html("<font color='red'>两次输入密码不一致！</font>");
		  ok3 = false;
		}else{
		  jq('.mmts3').html("<font color='#0c0'>恭喜你，已经能连续输俩密码了！</font>");
		  ok3 = true;
		}
	}).keyup(function(){
		jq(this).triggerHandler('blur');
	});

	//执行修改
	jq('.btn1sub').click(function(){
		jq('.passwd35,.passwd35,#yuanmm24').trigger('blur');
		if(ok1 && ok2 && ok3)
		{
			//执行修改
			var oldPass = jq('#yuanmm24').val();
			var newPass = jq('.passwd33').val();
			//发送ajax
			jq.post('/center/self/pass/do_update',{oldPass:oldPass,newPass:newPass,_token:"{{csrf_token()}}"},function(msg){
				switch(msg)
				{
					case '2':  //旧密码错误
						layer.msg('原密码错误！');
						break;
					case '3':  //修改成功
						layer.alert('密码修改成功！', {
			                icon: 6,
			                skin: 'layer-ext-moon'
			            },function(){
			                window.location.href = '/login';
			            });
						break;
					case '4':  //修改失败
						layer.msg('密码修改失败！');
						break;
				}
			});
		}else{
			layer.msg('请正确填写信息！');
        	return false;
		}
	});
 </script>
 </div>
 </div>
</div>
@endsection
