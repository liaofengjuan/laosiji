@extends('home.layout.header_footer')
@section('content')
<link href="{{asset('/homes/css/whir_styles.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/homes/js/jquery-1.7.2.min.js"></script> 

<!--container-->
<div id="container">
<div class="kssearch">
<div class="address">
<h1>按地区</h1><h2><span>全部</span><a href="#">安徽</a><a href="#">河北</a><a href="#">山西</a><a href="#">辽宁</a><a href="#">吉林</a><a href="#">黑龙江</a><a href="#">江苏</a><a href="#">浙江</a><a href="#">福建</a><a href="#">江西</a><a href="#">山东</a><a href="#">河南</a><a href="#">湖北</a><a href="#">湖南</a><a href="#">广东</a><a href="#">海南</a><a href="#">四川</a><a href="#">贵州</a><a href="#">云南</a><a href="#">陕西</a><a href="#">甘肃</a><a href="#">青海</a><a href="#">台湾</a><a href="#">内蒙古</a><a href="#">广西</a><a href="#">西藏</a><a href="#">宁夏</a><a href="#">新疆</a></h2>
</div>
<div class="address">
<h1>按类型</h1><h2><span>全部</span><a href="#">语文</a><a href="#">数学</a><a href="#">英语</a><a href="#">地理</a><a href="#">政治</a><a href="#">历中</a><a href="#">生物</a><a href="#">化学</a><a href="#">物理</a><a href="#">体育</a><a href="#">美术</a></h2>
</div>
<div class="address">
<h1>搜热词</h1><h2><span>全部</span><a href="#">写作提高</a><a href="#">阅读理解</a><a href="#">微 积 分</a><a href="#">解析几何</a><a href="#">课前预习</a><a href="#">课后练习</a><a href="#">中国历史</a><a href="#">世界历史</a><a href="#">立体几何</a><a href="#">平面向量</a><a href="#">综合测试</a><a href="#">名师答疑</a></h2>
</div>
</div>
<div class="kssearchbox">
<span class="sspx">按排序</span>
<div class="SelectBox">
 <span class="SelectText">请选择</span>
 <dl class="SelectList">
     <dt><a href="javascript:void(0)">香港</a></dt>
     <dt><a href="javascript:void(0)">北京</a></dt>
     <dt><a href="javascript:void(0)">广州</a></dt>
     <dt><a href="javascript:void(0)">上海</a></dt>
     <dt><a href="javascript:void(0)">杭州</a></dt>
     <dt><a href="javascript:void(0)">长沙</a></dt>
 </dl>
</div>
<script type="text/javascript">
  $(".SelectBox").each(function(){
		$(this).find(".SelectText").click(function(){
			 var SelectListStatis = $(this).next(".SelectList").css("display");
			 if(SelectListStatis == "none"){
					$(this).next(".SelectList").show();
				 }
			 else{
					$(this).next(".SelectList").hide();
				 }
		 });
		 $(this).find(".SelectList").children("dt").click(function(){
				 var Value = $(this).find("a").text();
				 $(this).parents(".SelectList").prev(".SelectText").text(Value);
				 $(this).parents(".SelectList").hide();
			 });
		 $(this).mouseleave(function(){ $(this).find(".SelectList").hide(); });
	});
</script>
<div class="wdss"><input type="text" class="input1" style="width:124px;height:23px;border:1px solid #e6e6e6;float:left;line-height:23px;color:#666666;padding-left:0px" /><input type="image" src="/homes/images/search.jpg"  class="btn1"/></div>
<span class="ssjg">共1200个筛选结果</span><div class="page1"><span class="num"><font class="f_blue">1</font>/41</span><span class="prev">上一页</span><span class="next"><a href="#">下一页</a></span> </div>
</div>

        
        <div class="splist"  style="width:auto;height:auto;">
          <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
		  <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
         <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
		  <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span><span class="time">07:20</span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
      </div>
	  <div class="page"><span class="prev">上一页</span><span class="num"><a href="#" class="on">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a></span><span class="next"><a href="#">下一页</a></span><em>217/5</em>转到
        <input name="textfield" type="text" value="5" class="inputpage"/>
        页
        <input type="submit" name="Submit" value="GO" class="btngo"/>
      </div>
</div>
@endsection