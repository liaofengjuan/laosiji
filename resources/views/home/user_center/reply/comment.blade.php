@extends('home.layout.center')
@section('right')
 <div class="right840">
 <div class="title9"><h1>评论</h1><a href="#" class="zxly"><img src="images/grzx/zxly.jpg" /></a></div>
 <div class="display">
<div class="title10"><span style="float:left; margin-left:20px;">评论列表</span><span style=" margin-right:20px;float:right">操作</span></div>
<ul class="lylist">
@foreach($comment as $v)
<li>
<div class="lyinfo">
<div class="gxqm">{{$v['content']}}</div>
<div class="reque">{{date('Y-m-d H:i:s',$v['created_at'])}} <a href="/video/play/index/{{$v['vid']}}">查看</a></div>
</div>
<div class="delete"><a onclick="scsc({{$v['id']}})" href="javascript:void(0);">删除</a>&nbsp;<a href="/center/comment/edit/{{$v['id']}}/3">编辑</a></div>
</li>
@endforeach
</ul>
<div class="myfenye">
	{!! $comment->render() !!}
  </div>
  <script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

<script type="text/javascript">
  var jq = $.noConflict(true);
  //删除评论
  function scsc(id)
  {
  	jq.post('/center/comment/destroy',{id:id,_token:'{{csrf_token()}}'},function(msg){
  		if(msg == '2')
  		{
  			alert('删除成功');
  			location.reload(true);
  			return false;
  		}else if(msg == "3"){
  			alert('删除失败');
  			return false;
  		}
  	})
  }

 </script>
 </div>
 </div>
</div>
@endsection