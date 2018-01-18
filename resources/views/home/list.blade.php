@extends('home.layout.header_footer')
@section('content')
<link href="{{asset('/homes/css/whir_styles.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/homes/js/jquery-1.7.2.min.js"></script> 

<!--container-->
<div id="container">
<div class="kssearch">
<div class="address">
  <h1>栏目</h1>
  <h2 class='h21'>
    <a href="javascript:;" >全部</a>
    @foreach($fatherType as $v)
    @if($v['title']==$title)
    <a href="{{url('/video/list/index/'.$v['title'])}}" class='myon'>{{$v['title']}}</a>
    @else
    <a href="{{url('/video/list/index/'.$v['title'])}}" >{{$v['title']}}</a>
    @endif
    @endforeach
  </h2>
</div>
<div class="address">
  <h1>按类型</h1>
  <h2 class='h22'>
    <a href="javascript:;" class="myon" onclick="sonClick(0,$(this))">全部</a>
    @if($sonType)
    @foreach($sonType as $v)
    <a href="javascript:;" onclick="sonClick({{$v['id']}},$(this))">{{$v['title']}}</a>
    @endforeach
    @endif
  </h2>
</div>
<div class="address">
  <h1>按资费</h1>
  <h2 class='h23'>
    <a href="javascript:;" class="myon" onclick="vipClick(0,$(this))">全部</a>
    <a href="javascript:;" onclick="vipClick(1,$(this))">免费</a>
    <a href="javascript:;" onclick="vipClick(2,$(this))">VIP</a>
  </h2>
</div>
<script type="text/javascript">

  //定义全局变量
  var datas = '';//用于接收ajax返回的数据
  var pageSize = '';//页大小
  var url = '';//ajax发送的地址
  var msg = '';//ajax要发送的数据

  //更新收到的结果
  function change(page,pageSize,data){
    $('.splist').children().remove();
    for(var i = (page-1)*pageSize;i<page*pageSize;i++){
      $('.splist').append('<a href="/video/play/index/'+data[i].id+'"><div class="myvideo"><div class="myvideoimg"><img src="" class="imgPath'+i+'"/><h3>'+data[i].video_title+'</h3><span class="play1">播放</span><span class="time">'+data[i].size+'</span></div><div class="title3"><div class="playtime">'+data[i].clicks+'次播放</div></div></div></a>');
    }

    for(var j = (page-1)*pageSize;j<page*pageSize;j++){
      $('.imgPath'+j).attr('src',"{{env('PATH_IMG')}}"+data[j].pic+'?imageView2/1/w/217/h/132/q/75|imageslim');
    }
  }

  //点击页数让其跳转
  function turn(k,obj){
    $('.page .num a').removeClass('on');
    obj.addClass('on');
    change(k,pageSize,datas);
  }

  //发送ajax
  function sendAjax(url,msg){
    $.post(url,msg,function(data){
      //移除上一次的内容
      $('.splist').children().remove();
      if(data!=1){
        
        var size = 3;//定义页大小
        var maxPage = Math.ceil(data.length/size);//计算总页数
        //判断总条数和页大小的关系
        if(size>data.length){
          size=data.length;
        }
        //更新页数
        $('.page').replaceWith("<div class='page'><span class='num'></span></div>");
        for(var k = 1;k<maxPage+1;k++){
          $('.num').append("<a onclick='turn("+k+",$(this))'>"+k+"</a>");
          if(k==1){
            $('.num a').addClass('on');
          }
        }
        //将ajax收到的数据存到全局变量中
        datas = data;
        pageSize = size;

        //更新内容
        change(1,pageSize,datas);   
      }
      
    },'json')
  }

  //查询子类中的相关电影
  function sonClick(sid,obj){
    $('.address .h22 a').removeClass('myon');
    obj.addClass('myon');
    var title = obj.html();
    if(title=='全部'){
        //获取父类的title
        var ftitle = $('.address .h21 a[class=myon]').html();
        //跳转到父类下所有的电影
        window.location.href = '/video/list/index/'+ftitle;
    }
    url = '/video/list/lson';
    msg = {'sid':sid,'_token':'{{csrf_token()}}'};
    //发送ajax
    sendAjax(url,msg);
    
  }

  //查询是否是vip
  // function vipClick(vid,obj){
  //   //添加样式
  //   $('.address .h23 a').removeClass('myon');
  //   obj.addClass('myon');

  // }


  
  
</script>
</div>
<div class="kssearchbox">
<span class="sspx">按排序</span>
<div class="SelectBox">
 <span class="SelectText">请选择</span>
 <dl class="SelectList">
     <dt><a href="javascript:void(0)">点击量</a></dt>
     <dt><a href="javascript:void(0)">评论量</a></dt>
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
<div class="wdss"><input type="text" class="input1" style="width:124px;height:23px;border:1px solid #e6e6e6;float:left;line-height:23px;color:#666666;padding-left:0px" /><image type="image" src="/homes/images/search.jpg"  class="btn1"></button></div>
<span class="ssjg">共1200个筛选结果</span>

</div>

        
      <div class="splist"  style="width:auto;height:auto;">
        @if($movies)
        @foreach($movies as $v)
          <div class="myvideo">
            <a href="{{url('/video/play/index/'.$movies['id'])}}">
              <div class="myvideoimg">
              <img src="{{env('PATH_IMG').$movies['pic'].'?imageView2/1/w/217/h/132/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
                <h3>{{$v['video_title']}}</h3>
                <span class="play1">播放</span>
                <span class="time">{{$v['size']}}</span></div>
              <div class="title3">
                @if($v['vip']==1)
                <div class="jiage">VIP</div>
                @endif
                <div class="playtime">{{$v['clicks']}}次播放</div>
              </div>
            </a>
          </div>
        @endforeach  
      </div>
      <div class="page">
        <div class="myfenye">{!! $movies->render() !!}</div>
          
      </div>
      @endif
	  
</div>
@endsection