@extends('home.layout.center')
@section('right')
  <div class="right840">
    <div class="title7">
      <h1>观看记录</h1>
      <div class="nysearchbox">
        <!-- <input type="text" value="页面搜索" onFocus="this.value='';" onBlur="if(this.value==''){this.value='页面搜索';}" name="" class="input6"/> -->
        <!-- <input type="image" src="/homes/images/grzx/btn4.jpg" class="btn5" /> -->
      </div>
    </div>
    <div class="display">
      <ul>
        @foreach($data as $k=>$v)
        <li class="gkvideo">
          <div class="gkvideoimg"><img src="{{env('PATH_IMG').$v['pic'].'?imageView2/1/w/146/h/87/q/75|imageslim'}}" /> <span class="gktime">{{$v['size']}}</span><span class="spclose"><!-- <a href="#"><img src="/homes/images/grzx/close.png" /></a> --></span></div>
          <div class="title8">
            <h1><a href="/video/play/index/{{$v['id']}}">{{$v['video_title']}}</a></h1>
            <h2><span class="gksj" style="font-size:12px">{{date('Y-m-d H:i:s',$history[$k]['created_at'])}}</span><span class="gkjd"></span></h2>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection