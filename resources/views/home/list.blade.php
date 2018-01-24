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
    <a href="{{url('/video/list/index/'.$v['title'])}}" fatherId="{{$v['id']}}" class='myon'>{{$v['title']}}</a>
    @else
    <a href="{{url('/video/list/index/'.$v['title'])}}" fatherId="{{$v['id']}}">{{$v['title']}}</a>
    @endif
    @endforeach
  </h2>
</div>
<div class="address">
  <h1>按类型</h1>
  <h2 class='h22'>
    <a href="javascript:;" class="myon" onclick="sonClick($(this))">全部</a>
    @if($sonType)
    @foreach($sonType as $v)
    <a href="javascript:;" sonId="{{$v['id']}}" onclick="sonClick($(this))">{{$v['title']}}</a>
    @endforeach
    @endif
  </h2>
</div>
<div class="address">
  <h1>按资费</h1>
  <h2 class='h23'>
    <a href="javascript:;" class="myon" vipId='0' onclick="vipClick($(this))">全部</a>
    <a href="javascript:;" vipId='1' onclick="vipClick($(this))">免费</a>
    <a href="javascript:;" vipId='2' onclick="vipClick($(this))">VIP</a>
  </h2>
</div>

</div>
<div class="kssearchbox">
  <span class="sspx">排序条件</span>
  <div class="SelectBox" onclick="orderByTime($(this))">最新</div>
  <div class="SelectBox" onclick="orderByClick($(this))">最热</div>
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

  //选择类型
  function searchType(orders){
    //获取是否为vip选项的值
    var vid = $('.address .h23 a[class=myon]').attr('vipId');
    //获取该父类和子类的id
    var sid = $('.address .h22 a[class=myon]').attr('sonId');
    var fid = $('.address .h21 a[class=myon]').attr('fatherId');
    var msgf = '';
    var msgs = '';
    if(orders){
      msgf = {'fid':fid,'orders':orders,'_token':'{{csrf_token()}}'};
      msgs = {'sid':sid,'orders':orders,'_token':'{{csrf_token()}}'};
    }else{
      msgf = {'fid':fid,'_token':'{{csrf_token()}}'};
      msgs = {'sid':sid,'_token':'{{csrf_token()}}'};
    }
    
    
    switch(vid){
      case '0'://全部
          //子类：全部all   是否vip：全部all
          if(!sid){
            url = '/video/list/aall';
            msg = msgf;
          }
          //子类：有hav   是否vip：全部all
          if(sid){
            url = '/video/list/hall';
            msg = msgs
          }
        break;
      case '1'://免费
          //子类:全部all     是否vip：免费free
          if(!sid){
            url = '/video/list/afree';
            msg = msgf
          }
          //子类：有hav   是否vip：免费free
          if(sid){
            url = '/video/list/hfree';
            msg = msgs
          }
        break;
      case '2'://vip
          //子类:全部all     是否vip：vip
          if(!sid){
            url = '/video/list/avip';
            msg = msgf
          }
          //子类：有hav   是否vip：vip
          if(sid){
            url = '/video/list/hvip';
            msg = msgs
          }
        break;
    }
    //发送ajax
    sendAjax(url,msg);
  }

  //查询子类中的相关电影
  function sonClick(obj){
    $('.address .h22 a').removeClass('myon');
    obj.addClass('myon');
    searchType();
    
  }

  // 查询是否是vip
  function vipClick(obj){

    //添加样式
    $('.address .h23 a').removeClass('myon');
    obj.addClass('myon');
    searchType();
  }

  //排序
  //排序鼠标移入效果
  $('.kssearchbox .SelectBox').hover(function(){
    $(this).css('cursor','pointer');
  },function(){
  })
  //按时间排序
  function orderByTime(obj){
    $('.kssearchbox .SelectBox').removeClass('myon');
    obj.addClass('myon');

    searchType(1);//按时间排序
  }
  //按最热
  function orderByClick(obj){
    $('.kssearchbox .SelectBox').removeClass('myon');
    obj.addClass('myon');

    searchType();//按最热排序
  }

  
</script>       
<div class="splist"  style="width:auto;height:auto;">
        @if($movies)
        @foreach($movies as $v)
          <div class="myvideo">
            <a href="{{url('/video/play/index/'.$v['id'])}}">
              <div class="myvideoimg">
              <img src="{{env('PATH_IMG').$v['pic'].'?imageView2/1/w/217/h/132/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
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