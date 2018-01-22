<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>安徽慕界网络科技有限公司</title>
<link href="/homes/css/whir_common.css" rel="stylesheet" type="text/css" />
<link href="/homes/css/whir_homes.css" rel="stylesheet" type="text/css" />
@section('style')
<link rel="stylesheet" href="/homes/css/style.css">
@show
@section('sc')
<script type="text/javascript" src="/homes/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/homes/js/index_solid.js"></script>
<script type="text/javascript" src="/homes/js/column.js"></script>
@show

<!--[if IE 6]>
<script type="text/javascript" src="script/iepng.js"></script>
<script type="text/javascript"> 
EvPNG.fix('img,.content,.svc-payment,.svc-gathering,.svc-weg,.svc-tx,.svc-credit,.svc-aa,.svc-donate,.svc-mobile,.svc-escore,.svc-rent,.svc-cashgift,.con,.aoff,'); </script>
<![endif]-->
</head>
<body>
<!--头部-->
<div class="head" style="background-color:#F0F0F0">
<div class="headm">
<!--登陆后显示会员-->
<div class="member">
@if(session('user'))
  <div class="tuxiang">
    <img src="{{session('pic')}}" onerror="javascript:this.src='/homes/images/my_moren.jpg'" width="35" height="35" />
  </div>
  <div class="hyname">
    <ul id="xiala">
      <li><a href="#">{{session('user')}}</a>
        <ul id="xl" style="display:none;position:absolute;background-color:#F0F0F0;border:1px solid #dfdfdf;border-top:none;text-align:center">
          <li><a style="display:block;padding:0 5px" href="/center/self">个人中心</a></li>
          <li><a style="display:block;padding:0 5px" href="/signout">注销</a></li>
        </ul>
      </li>
    </ul>
<script type="text/javascript">
  var xiala = document.getElementById('xiala');
  var xl = document.getElementById('xl');
  xiala.onmouseover = function(){
    xl.style.display = 'block';
  }
  xiala.onmouseout = function(){
    xl.style.display = 'none';
  }
</script>  
  </div>
</div>
@else
<div class="huiyuan"><ul><li class="hy1"><a href="/login">登录</a></li><li class="hy2"><a href="/register";>注册</a></li></ul></div></div>
@endif
<!--快捷导航-->
<div class="kjnav">

</div>
</div>
</div>
<div id="header">
  <div class="top">
    <div class="topmain">
      <div class="searchbox">
        <div class="so_so">
          <div class="logo"><a href="#" title="目课网"><img src="/homes/images/logo.jpg" / alt="目课网"></a></div>
          <div class="mk_so">
            <form action="{{url('/search')}}" method="post">
              {{csrf_field()}}
              <input type="text" class="input"  name="search" value="" />
              <!-- <input type="image" src="/homes/images/btn.jpg" class="btn" /> -->
              <button type="submit" style="border:0.1px solid #fff"><img src="/homes/images/btn.jpg"></button>
            </form>
            <script type="text/javascript">
              $('button[type=submit]:eq(0)').click(function(){
                //获取搜索内容，若为空，则不能提交
                var search = $('input[name=search]').val();
                if(search.length<1){
                  alert('请输入搜索内容');
                  return false;
                }
                return true;
              })
            </script>
          </div>
        </div>
      </div>
      <!--菜单导航-->
       <div class="topnavmenu">
        <div class="nav">
          <ul>
            <li><a href="/" class="on">首页</a></li>
            @foreach($fatherType as $v)
            <li><a href="{{url('/video/list/index/'.$v['title'])}}">{{$v['title']}}</a></li>
            @endforeach
          </ul>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--底部-->
<div class="clear"></div>
<!-- header结束 -->
@section('content')
@show
<!-- footer开始 -->
<div class="clear"></div>
<div id="footer">
  <div class="links">
    <div class="linkpic">
      <h1>合作单位</h1>
      <div class="picshow">
        <div id="demo" style="width:1017px; height:49px; overflow:hidden;">
          <table border=0 align=center cellpadding=0 cellspacing=0 cellspace=0 >
            <tr>
              <td valign=top  id='marquePic1'><table width='100%' border='0' cellspacing='0'>
                  <tr>
                    @foreach($friendLink as $v)
                    <td align="center" ><a href="{{$v['path']}}" target="_blank"><img src="{{env('PATH_IMG').$v['logo'].'?imageView2/2/w/115/h/49/q/75|imageslim'}}" /></a></td>
                    @endforeach
                  </tr>
                </table></td>
                <td id='marquePic2' valign='top'></td>
            </tr>
          </table>
        </div>
<script type="text/javascript">
    var speed=50 
    marquePic2.innerHTML=marquePic1.innerHTML 
    function Marquee(){ 
    if(demo.scrollLeft>=marquePic1.scrollWidth){ 
    demo.scrollLeft=0 
    }else{ 
    demo.scrollLeft++ 
    } 
    } 
    var MyMar=setInterval(Marquee,speed) 
    demo.onmouseover=function() {clearInterval(MyMar)} 
    demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)} 
</script>
      </div>
    </div>
    <div class="clear"></div>
    <!--合作伙伴-->
    <div class="linktext">
      <h1>合作伙伴</h1>
      <div class="textlink">
        @foreach($friendLink as $v)
        <a href="{{$v['path']}}" target="_blank">{{$v['title']}}</a>
        @endforeach  
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="Navigation">
      <a href="#">合作伙伴</a>
      <a href="#">联系客服</a>
      <a href="#">开放平台</a>
      <a href="#">诚征英才</a>
      <a href="#">联系我们</a>
      <a href="#">网站地图</a>
      <a href="#">法律声明</a></div>
    <div class="copy">Copyright © 2014 MYCLASS.C0M. All Rights Reserved<br />
      老司机视频网 版权所有 老司机视频网经营许可证<br />
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
  <!-- alert($('.copy').text()); -->
</script>
<script type="text/javascript" src="/homes/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/homes/js/index_solid.js"></script>
<script type="text/javascript" src="/homes/js/column.js"></script>