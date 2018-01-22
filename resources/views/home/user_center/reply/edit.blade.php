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
			<td class="left">内容：</td>
			<td class="right"><textarea class="jb333" name="" id="" cols="30" rows="5">{{$data['content']}}</textarea></td>
		</tr>
		<tr>
			<td></td>
			<td class="right sub"><input id="tijiao" type="button" value="修改" /></td>
		</tr>
	</table>
	</form>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

 <script type="text/javascript">
 	var jq7 = $.noConflict(true);
  	//执行修改
  	jq7('#tijiao').click(function(){
  		var cont = jq7('.jb333').val();
  		jq7.post('/center/comment/doupdate',{content:cont,id:'{{$data["id"]}}',type:'{{$jb}}',_token:'{{csrf_token()}}'},function(msg){
  			if(msg == '3')
  			{
  				alert('修改成功');
  			}else if(msg == '4'){
  				alert('修改失败');
  			}
  		})
  	})

 </script>
</div>
</div>
@endsection