@extends('home.layout.header_footer')
@section('content')
<!--公告-->
<!-- <div class="notice">
  <h1>公告栏：</h1>
  <div class="txtMarquee-left">
    <div class="bd">
      <ul class="infoList">
        <li><a href="#" target="_blank">中国打破了世界软件巨头规则</a><span>[11-11]</span></li>
        <li><a href="#" target="_blank">施强：高端专业语言教学</a><span>[11-11]</span></li>
        <li><a href="#" target="_blank">新加坡留学，国际双语课程</a><span>[11-11]</span></li>
        <li><a href="#" target="_blank">高考后留学日本名校随你选</a><span>[11-11]</span></li>
        <li><a href="#" target="_blank">教育培训行业优势资源推介</a><span>[11-11]</span></li>
        <li><a href="#" target="_blank">女友坚持警局完婚不抛弃</a><span>[11-11]</span></li>
      </ul>
    </div>
    <div class="hd"> <a class="next"></a> <a class="prev"></a> </div>
  </div>
  <script type="text/javascript">
		jQuery(".txtMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50});
		</script>
</div> -->
<!--专题and图片切换-->
<div class="clear"></div>
<div class="topics">
  <!--图片切切换-->
  <div id="banner">
    <div id="ifocus">
      <center>
        <div class="demo">
          <a class="control prev"></a><a class="control next abs"></a><!--自定义按钮，移动端可不写-->
          <div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
            <ul>
              @foreach($data_slideshow as $v)
              <li><a href="{{url('/video/play/index/'.$v['vid'])}}"><img src="{{env('PATH_IMG').$v['pic'].'?imageView2/1/w/800/h/450/q/75|imageslim'}}" alt='' /></a></li>
              @endforeach
            </ul>
          </div>

        </div>
        <script src="/homes/js/YS.jquery.min.js"></script>
        <script src="/homes/js/YuxiSlider.jQuery.min.js"></script>
        <script>
          $(".slider").YuxiSlider({
            width:900, //容器宽度
            height:450, //容器高度
            control:$('.control'), //绑定控制按钮
            during:4000, //间隔4秒自动滑动
            speed:800, //移动速度0.8秒
            mousewheel:true, //是否开启鼠标滚轮控制
            direkey:true //是否开启左右箭头方向控制
          });
        </script>
      </center>
    </div>
  </div>
  <!--专题栏目-->
  <div class="ztzl">
    <div style="margin-bottom:10px;"><a href="{{$advertise[0]->address}}"><img src="{{env('PATH_IMG').$advertise[0]->pic.'?imageView2/1/w/269/h/102/q/75|imageslim'}}" /></a></div>
    <div style="margin-bottom:10px;"><a href="{{$advertise[1]->address}}"><img src="{{env('PATH_IMG').$advertise[1]->pic.'?imageView2/1/w/269/h/102/q/75|imageslim'}}" /></a></div>
    <div style="margin-bottom:10px;"><a href="{{$advertise[2]->address}}"><img src="{{env('PATH_IMG').$advertise[2]->pic.'?imageView2/1/w/269/h/102/q/75|imageslim'}}" /></a></div>
    <div><a href="{{$advertise[3]->address}}"><img src="{{env('PATH_IMG').$advertise[3]->pic.'?imageView2/1/w/269/h/102/q/75|imageslim'}}" /></a></div>
  </div>
</div>

<!--原创精品 and 推荐排行-->
<div class="column1">
  <div class="original">
    <!--原创精品-->
    <div class="oricolumn">
      <div class="title2">
        <h1>原创精品</h1>
      </div>
      <div class="clear"></div>
      <div class="orilist">
        <div class="topvideo">
          <a href="{{url('/video/play/index/'.$onlyMovies[0]['id'])}}"> 
            <img src="{{env('PATH_IMG').$onlyMovies[0]->pic.'?imageView2/1/w/419/h/333/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/pic3.jpg'"/>
            <div class="titleinfo">
              <h1>{{$onlyMovies[0]->video_title}}</h1>
              <div class="spxx">
                {{$onlyMovies[0]->clicks}}次播放 | 1,629次评论
              </div>
            </div>
            <span class="sptime">
                {{$onlyMovies[0]['size']}}
            </span> 
            <span class="play">
              <a href="#" target="_blank" title="播放">播放</a>
            </span>
          </a> 
        </div>
        <div class="splist">
          <div class="myvideo mb15">
            <a href="{{url('/video/play/index/'.$onlyMovies[1]['id'])}}">
              <div class="myvideoimg">
                <img src="{{env('PATH_IMG').$onlyMovies[1]->pic.'?imageView2/1/w/212/h/118/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
                <h3>{{$onlyMovies[1]['video_title']}}</h3>
                <span class="play1">播放</span>
              </div>
              <div class="title3">
                <div class="playtime">
                  {{$onlyMovies[1]->clicks}}次播放 | 1,629次评论
                </div>
              </div>
            </a>
          </div>
          <div class="myvideo ml20 mb15">
            <a href="{{url('/video/play/index/'.$onlyMovies[2]['id'])}}">
              <div class="myvideoimg">
                <img src="{{env('PATH_IMG').$onlyMovies[2]->pic.'?imageView2/1/w/212/h/118/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
                <h3>{{$onlyMovies[2]['video_title']}}</h3>
                <span class="play1">播放</span>
              </div>
              <div class="title3">
                <div class="playtime">{{$onlyMovies[2]->clicks}}次播放 | 1,629次评论
                </div>
              </div>
            </a>
          </div>
          <div class="myvideo">
            <a href="{{url('/video/play/index/'.$onlyMovies[3]['id'])}}">
              <div class="myvideoimg">
                <img src="{{env('PATH_IMG').$onlyMovies[3]->pic.'?imageView2/1/w/212/h/118/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
                <h3>{{$onlyMovies[3]['video_title']}}</h3>
                <span class="play1">播放</span>
              </div>
              <div class="title3">
                <div class="playtime">{{$onlyMovies[3]->clicks}}次播放 | 1,629次评论
                </div>
              </div>
            </a>
          </div>
          <div class="myvideo ml20">
            <a href="{{url('/video/play/index/'.$onlyMovies[4]['id'])}}">
              <div class="myvideoimg">
                <img src="{{env('PATH_IMG').$onlyMovies[4]->pic.'?imageView2/1/w/212/h/118/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/my.jpg'"/>
                <h3>{{$onlyMovies[4]->video_title}}</h3>
                <span class="play1">播放</span>
              </div>
              <div class="title3">
                <div class="playtime">{{$onlyMovies[4]->clicks}}次播放 | 1,629次评论
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--推荐排行-->
    <div class="right269">
      <div class="title4">
        <h1>推荐排行</h1>
        <h2>TOP</h2>
      </div>
      <div class="paihang">
        <ul class="list">
          @foreach($hot as $k=>$v)
          @if($k<3)
            <li><span class="dig">{{$k+1}}</span><a href="{{url('/video/play/index/'.$v['id'])}}">{{$v['video_title']}}</a></li>
          @else
            <li><span class="dig1">{{$k+1}}</span><a href="{{env('PATH_IMG').$v['play'].'/'.$v['id']}}}}">{{$v['video_title']}}</a></li>
          @endif
          @endforeach
        </ul>
      </div>
      <div class="ad">
        <a href="#"><img src="/homes/images/ad2.jpg" /></a>
      </div>
    </div>
  </div>
</div>

<!-- 循环最高级分类 -->

<!--人气班级-->
@foreach($data as $k=>$v)
@if(count($v)>0)
<div class="classes">
  <div class="picScroll-left">
    <div class="hd">
      <h1>{{$k}}</h1>
  	  <div class="change">
        <a href="{{url('/video/list/index/'.$k)}}" >more >>></a>
      </div>
    </div>
    <div class="bd">
      <ul class="picList">
        @foreach($v as $detail)
        <li>
          <a href="{{url('/video/play/index/'.$detail['id'])}}" target="_blank">
            <div class="pic">
              <img src="{{env('PATH_IMG').$detail['pic'].'?imageView2/1/w/221/h/194/q/75|imageslim'}}" onerror="javascript:this.src='/homes/images/pic4.jpg"/>   
            </div>
            <div class="titlei">
              <span class="classtitle">{{$detail['video_title']}}</span>
              <span class="classinfo">播放次数： {{$detail['clicks']}}次  评论量：111次
              </span>
            </div>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif
@endforeach

@endsection