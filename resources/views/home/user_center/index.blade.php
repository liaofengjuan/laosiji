@extends('home.layout.header_footer')
@section('content')
<link href="/homes/css/whir_grzx.css" rel="stylesheet" type="text/css" />
<div class="subbox">
  <!--左侧部分-->
  <div class="left180">
    <div class="grtx">
      <div class="grimg"><img src="/homes/images/grzx/grtx.jpg" /></div>
      <div class="grname"><a href="班级.html">计算机班级</a></div>
    </div>

    <ul class="menu1">
      <li><a onclick="return click_a('divOne_1','div_one')" style="cursor:pointer;"><em id="div_one">班级管理</em></a></li>
      <div class="menubox"  id="divOne_1" style="display:none;">
        <p><a href="班级-发布资料.html" >班级资料</a></p>
        <p><a href="班级公告.html" >班级公告</a></p>
        <p><a href="#" >班级学生</a></p>
      </div>
    </ul>
    
 	<ul class="menu2 menu1">
      <li><a onclick="return click_a('divOne_2','div_two')" style="cursor:pointer;"><em id="div_two">班级管理</em></a></li>
      <div class="menubox"  id="divOne_2" style="display:none;">
        <p><a href="班级-发布资料.html" >班级资料</a></p>
        <p><a href="班级公告.html" >班级公告</a></p>
        <p><a href="#" >班级学生</a></p>
      </div>
    </ul>

    <ul class="menu3 menu1">
      <li><a onclick="return click_a('divOne_3','div_three')" style="cursor:pointer;"><em id="div_three">班级管理</em></a></li>
      <div class="menubox"  id="divOne_3" style="display:none;">
        <p><a href="班级-发布资料.html" >班级资料</a></p>
        <p><a href="班级公告.html" >班级公告</a></p>
        <p><a href="#" >班级学生</a></p>
      </div>
    </ul>

	<ul class="menu4 menu1">
      <li><a onclick="return click_a('divOne_4','div_four')" style="cursor:pointer;"><em id="div_four">班级管理</em></a></li>
      <div class="menubox"  id="divOne_4" style="display:none;">
        <p><a href="班级-发布资料.html" >班级资料</a></p>
        <p><a href="班级公告.html" >班级公告</a></p>
        <p><a href="#" >班级学生</a></p>
      </div>
    </ul>

    <script language="javascript" type="text/javascript">
        function click_a(divDisplay,bgPosition)
        {
            if(document.getElementById(divDisplay).style.display != "block")
            {
                document.getElementById(divDisplay).style.display = "block";
                document.getElementById(bgPosition).style.backgroundPosition = "right -253px";
            }
            else
            {
                document.getElementById(divDisplay).style.display = "none";
                document.getElementById(bgPosition).style.backgroundPosition = "right -221px";
            }
        }
    </script>



    <!-- <ul class="menu2">
      <li><a href="#"><em>视频管理</em></a></li>
      <div class="menubox">
        <p><a href="个人中心-上传视频.html" >上传视频</a></p>
      </div>
    </ul>
    <ul class="menu3">
      <li><a href="#"><em>学习资料</em></a></li>
      <div class="menubox">
        <p><a href="班级-发布资料.html" >资料管理</a></p>
        <p><a href="班级-课件推荐.html" >课件推荐</a></p>
      </div>
    </ul>
    <ul class="menu4">
      <li><a href="#"><em>在线自测</em></a></li>
      <div class="menubox">
        <p><a href="班级-试卷管理.html" >试题管理</a></p>
        <p><a href="班级-试卷管理.html" >试卷管理</a></p>
      </div>
    </ul>
    <ul class="menu5">
      <li><a href="#"><em>在线互动</em></a></li>
      <div class="menubox">
        <p><a href="游客班级留言.html" >班级讨论</a></p>
        <p><a href="班级-学生提问.html" >学生提问</a></p>
      </div>
    </ul> -->


  </div>
  <!--右侧部分-->
  <div class="right840">
    <div class="title7">
      <h1>资料管理</h1>
      <input type="image" src="/homes/images/class/fbzl.jpg"  style="float:right; margin-top:15px;"/>
    </div>
    <!--我的回答-->
    <div class="bjtitle">
      <div class="bjxx">资料列表</div>
      <div class="bjpx"><font class="f_black">排序：</font>发布时间&nbsp;<img src="/homes/images/grzx/bjpx.jpg" /></div>
      <div class="bjcz">操作</div>
    </div>
    <ul class="hdlist">
      <li>
        <div class="agree"><a href="#"><img src="/homes/images/class/zltb.jpg" /></a></div>
        <div class="hdinfo">
          <div class="hdtitle"><a href="#">京商商贸城精品百货区招商推介会盛大举行…… </a></div>
          <div class="hdjf">高中数学问题 求大神解答……</div>
        </div>
        <div class="hddate">2014-08-08</div>
        <div class="wdzt"><a href="#">编辑</a></div>
      </li>
      <li>
        <div class="agree"><a href="#"><img src="/homes/images/class/zltb.jpg" /></a></div>
        <div class="hdinfo">
          <div class="hdtitle"><a href="#">京商商贸城精品百货区招商推介会盛大举行…… </a></div>
          <div class="hdjf">高中数学问题 求大神解答……</div>
        </div>
        <div class="hddate">2014-08-08</div>
        <div class="wdzt"><a href="#">编辑</a></div>
      </li>
	  <li>
        <div class="agree"><a href="#"><img src="/homes/images/class/zltb.jpg" /></a></div>
        <div class="hdinfo">
          <div class="hdtitle"><a href="#">京商商贸城精品百货区招商推介会盛大举行…… </a></div>
          <div class="hdjf">高中数学问题 求大神解答……</div>
        </div>
        <div class="hddate">2014-08-08</div>
        <div class="wdzt"><a href="#">编辑</a></div>
      </li>
	  <li>
        <div class="agree"><a href="#"><img src="/homes/images/class/zltb.jpg" /></a></div>
        <div class="hdinfo">
          <div class="hdtitle"><a href="#">京商商贸城精品百货区招商推介会盛大举行…… </a></div>
          <div class="hdjf">高中数学问题 求大神解答……</div>
        </div>
        <div class="hddate">2014-08-08</div>
        <div class="wdzt"><a href="#">编辑</a></div>
      </li>
    </ul>
    <div class="page"><span class="prev">上一页</span><span class="num"><a href="#" class="on">1</a><a href="#">2</a></span><span class="next"><a href="#">下一页</a></span> </div>
  </div>
  
</div>
@endsection