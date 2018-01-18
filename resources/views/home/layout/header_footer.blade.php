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
<ul>
<li class="navli1"><a href="#">APP下载</a></li>
<li class="navli2"><a href="#">收藏我们</a></li>
<li class="navli3"><a href="#">新手引导</a></li>
</ul>
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
            <input type="text" class="input"  name=""/>
            <input type="image" src="/homes/images/btn.jpg" class="btn" />
          </div>
        </div>
      </div>
      <!--菜单导航-->
       <div class="topnavmenu">
        <div class="nav">
          <ul>
            <li><a href="/" class="on">首页</a></li>
            @foreach($fatherType as $v)
            <li><a href="#">{{$v['title']}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="question">
          <ul>
            <li class="li5"><a href="#">我要开班</a></li>
            <li class="li6"><a href="#">我要提问</a></li>
            <li class="li7"><a href="#">我要问答</a></li>
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
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link1.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link2.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link3.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link4.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link5.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link6.jpg" /></a></td>
                    <td align=center><a href="#" target="_blank"><img src="/homes/images/link7.jpg" /></a></td>
                  </tr>
                </table></td>
              <td id="marquePic2 valign=top"></td>
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
      <div class="textlink"><a href="#" target="_blank">毒霸网址大全</a> | <a href="#" target="_blank">搜狗网址导航</a> |<a href="#" target="_blank"> 2345影视</a> | <a href="#" target="_blank">hao123</a> | <a href="#" target="_blank">搜狗搜索</a> |<a href="#" target="_blank"> 搜库</a> | <a href="#" target="_blank">必应</a> | <a href="#" target="_blank">豆瓣</a> | <a href="#" target="_blank">易迅网</a> |<a href="#" target="_blank"> 猫扑</a> | <a href="#" target="_blank">百度贴吧</a> |<a href="#" target="_blank"> 新浪微博</a> |<a href="#" target="_blank"> 果壳网</a> | <a href="#" target="_blank">人民数字</a> | <a href="#" target="_blank">114啦影视</a> | <a href="#" target="_blank">太平洋时尚网</a> | <a href="#" target="_blank">健康卫视</a> | <a href="#" target="_blank">海报网</a> | <a href="#" target="_blank">电影网</a> | <a href="#" target="_blank">178游戏网</a> | <a href="#" target="_blank">刷机精灵</a> | <a href="#" target="_blank">智能电视网</a> | <a href="#" target="_blank">奇珀市场</a> | <a href="#" target="_blank">电视家</a></div>
    </div>
  </div>
  <div class="copyright">
    <div class="Navigation"><a href="#">关于目课</a><a href="#">合作伙伴</a><a href="#">营销中心</a><a href="#">廉正举报</a><a href="#">联系客服</a><a href="#">开放平台</a><a href="#">诚征英才</a><a href="#">联系我们</a><a href="#">网站地图</a><a href="#">法律声明</a></div>
    <div class="copy">Copyright © 2014 MYCLASS.C0M. All Rights Reserved. Designed by:<a href="http://www.wanhu.cn">Wanhu</a><br />
      目课网 版权所有 目课网经营许可证<br />
      <font class="f_red">当前在线人数：<b>154588</b> 人</font></div>
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