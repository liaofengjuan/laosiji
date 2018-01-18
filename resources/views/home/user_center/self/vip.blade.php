@extends('home.layout.center')
@section('right')
<style type="text/css">
	.dajiahuo {
		margin-top:50px;
		margin-left:60px;
		/*float:left;*/
		font-size: 16px;
	}
	.dajiahuo .left {
		text-align: right;
	}
	.dajiahuo .right {
		padding-left: 10px;
	}
	.dajiahuo tr {
		height:54px;
	}
	.dajiahuo label {
		margin-right: 22px;
	}
	.sub input {
		width:150px;
	}
</style>
<div class="right840">
<div class="title6"><h1><a href="#" class="on">VIP充值</a></h1></div>
<div class="dajiahuo">
	<form action="" method="post">
	<table>
		<tr>
			<td class="left">用户名：</td>
			<td class="right"><input type="text" value="{{session('user')}}" disabled></td>
		</tr>
		<tr>
			<td class="left">VIP充值：</td>
			<td class="right">
				<label>一个月：<input type="radio" name="vtime" value="1" /></label>
				<label>三个月：<input type="radio" name="vtime" value="3" /></label>
				<label>六个月：<input type="radio" name="vtime" value="6" /></label>
				<label>一年：<input type="radio" value="12" name="vtime" checked /></label>
			</td>
		</tr>
		<tr>
			<td></td>
			<td class="right sub"><input id="tijiao" type="button" value="充钱儿" /></td>
		</tr>
	</table>
	</form>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

 <script type="text/javascript">
 	var jq7 = $.noConflict(true);

 	jq7('#tijiao').click(function(){
 		var vt = jq7('input[name="vtime"]:checked').val();
 		jq7.post('/center/self/buyvip',{_token:'{{csrf_token()}}',vtime:vt},function(msg){
 			if(msg == '2')
 			{
 				alert('恭喜，购买成功！');
 				window.location.href = '/center/self';
 			}else if(msg == '3')
 			{
 				alert('抱歉，购买失败！');
 			}
 		});
 	});
 </script>
</div>
</div>
@endsection