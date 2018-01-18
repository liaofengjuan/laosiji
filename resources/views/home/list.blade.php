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
    <a href="javascript:;" class="myon">全部</a>
    @if($sonType)
    @foreach($sonType as $v)
    <a href="javascript:;">{{$v['title']}}</a>
    @endforeach
    @endif
  </h2>
</div>
<div class="address">
  <h1>按资费</h1>
  <h2 class='h23'>
    <a href="javascript:;" class="myon">全部</a>
    <a href="javascript:;" >免费</a>
    <a href="javascript:;" >VIP</a>
  </h2>
</div>
<script type="text/javascript">
  //查询子类中的相关电影
  $('.address .h22 a').click(function(){
    $('.address .h22 a').removeClass('myon');
    $(this).addClass('myon');
    var title = $(this).html();
    if(title=='全部'){
        //获取父类的title
        var ftitle = $('.address .h21 a[class=myon]').html();
        //跳转到父类下所有的电影
        window.location.href = '/video/list/index/'+ftitle;
    }
    //发送ajax
    $.post('/video/list/lson',{'title':title,'_token':'{{csrf_token()}}'},function(data){
          $('.splist').children().remove();
          if(data!=1){
            for(i in data){
              $('.splist').append('<a href="/video/play/index/'+data[i].id+'"><div class="myvideo"><div class="myvideoimg"><img src="" class="imgPath'+i+'"/><h3>'+data[i].video_title+'</h3><span class="play1">播放</span><span class="time">'+data[i].size+'</span></div><div class="title3"><div class="playtime">'+data[i].clicks+'次播放</div></div></div></a>');
            }

           for(j in data){
              $('.imgPath'+i).attr('src',"{{env('PATH_IMG')}}"+data[i].pic+'?imageView2/1/w/217/h/132/q/75|imageslim');
           }
            
          }
    },'json')
  })

  //查询vip中的视频
  $('.address .h23 a').click(function(){
      //获取获取父类和子类
      var fatherTitle = $('.address .h21 a[class=myon]').html();
      var sonTitle = $('.address .h22 a[class=myon]').html();
      $('.address .h23 a').removeClass('myon');
      $(this).addClass('myon');
      //发送ajax
      $.post('/video/list/lvip',{'fatherTitle':fatherTitle,'sonTitle':sonTitle,'_token':'{{csrf_token()}}'},function(data){
          $('.splist').children().remove();
          if(data!=1){
            for(i in data){
              $('.splist').append('<a href="/video/play/index/'+data[i].id+'"><div class="myvideo"><div class="myvideoimg"><img src="" class="imgPath'+i+'"/><h3>'+data[i].video_title+'</h3><span class="play1">播放</span><span class="time">'+data[i].size+'</span></div><div class="title3"><div class="playtime">'+data[i].clicks+'次播放</div></div></div></a>');
            }

           for(j in data){
              $('.imgPath'+i).attr('src',"{{env('PATH_IMG')}}"+data[i].pic+'?imageView2/1/w/217/h/132/q/75|imageslim');
           }
            
          }
    },'json')



  })
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
<!-- <div class="page1">
  <span class="num">
    <font class="f_blue">1</font>/41
  </span>
  <span class="prev">上一页</span>
  <span class="next">
    <a href="#">下一页</a>
  </span>
</div> -->
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
	  <!-- <div class="page">
      <span class="prev">上一页</span>
      <span class="num">
        <a href="#" class="on">1</a>
       
        <a href="#">8</a>
        <a href="#">9</a>
        <a href="#">10</a>
      </span>
      <span class="next">
        <a href="#">下一页</a>
      </span>
      <em>217/5</em>转到
      <input name="textfield" type="text" value="5" class="inputpage"/>
        页
      <input type="submit" name="Submit" value="GO" class="btngo"/>
    </div> -->
</div>
@endsection