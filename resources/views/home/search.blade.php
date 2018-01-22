@extends('home.layout.header_footer')
@section('detail')
@endsection
@section('style')
<link rel="stylesheet" href="/homes/css/search.css" type="text/css">
@endsection
@section('content')
<div class="body">
  @foreach($data as $v)
  <div class="center">
    <div class="left">
        <a href="{{url('/video/play/index/'.$v['id'])}}" title="{{$v['video_title']}}" target="_blank" > 
          <img src="{{env('PATH_IMG').$v['pic'].'?imageView2/1/w/217/h/160/q/75|imageslim'}}" alt="">
        </a>
    </div>
    <div class="right">
      <h2>
        <a href="{{url('/video/play/index/'.$v['id'])}}" title="{{$v['video_title']}}" target="_blank" >{{$v['video_title']}}</a>
      </h2>
      <p>导演： <span>{{$v['director']}}</span></p>
      <div class="infoA">
        <span>{{$v['info']}}</span>     
        <a href="{{url('/video/play/index/'.$v['id'])}}" title="查看详情" target="_blank">查看详情>></a>
      </div>
      <div class="infoB">
        <a href="{{url('/video/play/index/'.$v['id'])}}" class="btn-detail" target="_blank" >查看详情</a>  
      </div>  
    </div>
  </div>
  @endforeach
</div>
@endsection