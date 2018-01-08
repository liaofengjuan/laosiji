@extends('home.layout.header_footer')
@section('content')
<!--公告-->
<div class="notice">
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
</div>
<!--专题and图片切换-->
<div class="clear"></div>
<div class="topics">
  <!--图片切切换-->
  <div id="banner">
    <div id="ifocus">
      <div style="overflow:hidden" id="ifocus_pic">
        <div style="overflow:hidden; top: 0px; left: 0px" id="ifocus_piclist">
          <ul>
            <!--大图_start -->
            <li><a href="#" target=_blank><img border=0 alt=目课网 src="/homes/images/pic.jpg"></a> </li>
            <li><a href="#" target=_blank><img border=0 alt=目课网 src="/homes/images/pic.jpg"></a> </li>
            <li><a href="#" target=_blank><img border=0 alt=目课网 src="/homes/images/pic.jpg"></a> </li>
            <li><a href="#" target=_blank><img border=0 alt=目课网 src="/homes/images/pic.jpg"></a> </li>
            <li><a href="#" target=_blank><img border=0 alt=目课网 src="/homes/images/pic.jpg"></a>
              <!--大图_end -->
            </li>
          </ul>
        </div>
        <div id="ifocus_opdiv"></div>
        <div id="ifocus_tx">
          <ul>
            <!--小图列表_start -->
            <li class="current">
            <li class="normal">
            <li class="normal">
            <li class="normal">
            <li class="normal">
              <!--小图列表_end -->
            </li>
          </ul>
        </div>
        <div id="ifocus_btn">
          <!--小图_start -->
          <ul>
            <li class="current"><img border=0 alt=目课网 src="/homes/images/pic.jpg"> </li>
            <li class="normal"><img border=0 alt=目课网 src="/homes/images/pic.jpg"> </li>
            <li class="normal"><img border=0 alt=目课网 src="/homes/images/pic.jpg"> </li>
            <li class="normal"><img border=0 alt=目课网 src="/homes/images/pic.jpg"> </li>
            <li class="normal"><img border=0 alt=目课网 src="/homes/images/pic.jpg"></li>
          </ul>
          <!--小图_end -->
        </div>
      </div>
    </div>
  </div>
  <!--专题栏目-->
  <div class="ztzl">
    <div style="margin-bottom:10px;"><a href="#"><img src="/homes/images/zt1.jpg" /></a></div>
    <div style="margin-bottom:10px;"><a href="#"><img src="/homes/images/zt2.jpg" /></a></div>
    <div style="margin-bottom:10px;"><a href="#"><img src="/homes/images/zt3.jpg" /></a></div>
    <div><a href="#"><img src="/homes/images/zt4.jpg" /></a></div>
  </div>
</div>
<!--猜你喜欢 and 用户登录-->
<div class="column">
  <!--猜你喜欢-->
  <div class="like">
    <div class="likecolumn">
      <div class="title">
        <h1>猜你喜欢</h1>
        <h2 id="one1" onmouseover="setTab('one',1,3)" class="hover"><a href="#">收藏视频</a></h2>
        <h2 id="one2" onmouseover="setTab('one',2,3)"><a href="#">我的班级</a></h2>
        <h2 id="one3" onmouseover="setTab('one',3,3)"><a href="#">观看记录</a></h2>
        <div class="change"><a href="#">换一组</a></div>
      </div>
      <div class="likelist" id="con_one_1">
        <div class="likevideo fl">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
      </div>
      <div class="likelist" id="con_one_2" style="display:none">
        <div class="likevideo fl">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】冷漠的解药</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
      </div>
      <div class="likelist" id="con_one_3" style="display:none">
        <div class="likevideo fl">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">创造、创新和改变</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
        <div class="likevideo fl ml20">
          <div class="videoimg"><img src="/homes/images/pic1.jpg" /><span class="time">07:20</span></div>
          <div class="videotitle"><a href="#" target="_blank">【TED】外表不是全部</a></div>
          <div class="videoinfo"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
        </div>
      </div>
    </div>
    <!--用户登录-->
    <!-- <div class="right269">
      <div class="title1">
        <h1>用户登录</h1>
      </div>
      <div class="login">
	    <div class="user">用户名：<input type="text" value="请输入用户名"  onFocus="this.value='';" onBlur="if(this.value==''){this.value='请输入用户名';}" class="input1"/></div>
		<div class="password">密&nbsp;&nbsp;&nbsp;码 ：<input type="password" value="请输入密码"  onFocus="this.value='';" onBlur="if(this.value==''){this.value='请输入密码';}" class="input1"/></div>
        <div class="tiyan"><a href="#">登陆</a></div>
      </div>
    </div> -->
  </div>
</div>
<!--原创精品 and 推荐排行-->
<div class="column1">
  <div class="original">
    <!--原创精品-->
    <div class="oricolumn">
      <div class="title2">
        <h1>原创精品</h1>
        <h2><a href="#">目课出品</a></h2>
      </div>
      <div class="clear"></div>
      <div class="orilist">
        <div class="topvideo"> <img src="/homes/images/pic3.jpg" />
          <div class="titleinfo">
            <h1><a href="#">杨亚雄老师的雅思实战口语课【大耳朵英语】</a></h1>
            <div class="spxx"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            <div class="price"><a href="#">￥10</a></div>
          </div>
          <span class="sptime">1:07:20</span> <span class="play"><a href="#" target="_blank" title="播放">播放</a></span> </div>
        <div class="splist">
          <div class="myvideo mb15">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo ml20 mb15">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
          </div>
          <div class="myvideo ml20">
            <div class="myvideoimg"><img src="/homes/images/my.jpg" />
              <h3><a href="#">Nancy带你【玩转法兰西】...</a></h3>
              <span class="play1"><a href="#" title="播放">播放</a></span></div>
            <div class="title3">
              <div class="jiage"><a href="#">￥15</a></div>
              <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
            </div>
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
          <li><span class="dig">1</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig">2</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig">3</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig1">4</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig1">5</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig1">6</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig1">7</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
          <li><span class="dig1">8</span><a href="#">中考语文古诗词鉴赏题型及解题技巧</a></li>
        </ul>
      </div>
      <div class="ad"><a href="#"><img src="/homes/images/ad2.jpg" /></a></div>
    </div>
  </div>
</div>

<!-- 循环最高级分类 -->

<!--人气班级-->
<div class="classes">
  <div class="picScroll-left">
    <div class="hd">
      <h1>人气班级</h1>
	  <div class="change"><a href="#">换一组</a></div>
    </div>
    <div class="bd">
      <ul class="picList">
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic4.jpg" /></a></div>
          <div class="titlei"><span class="classtitle"><a href="#" target="_blank">MBA备考班</a></span><span class="classinfo">学生数：<a href="#">10255</a>人  开班讲师：<a href="#">Class01</a></span></div>
        </li>
        
      </ul>
    </div>
  </div>
</div>

<!-- 循环最高级分类结束 -->

<!--状元楼-->
<div class="champion">
  <div class="picScroll-left1">
    <div class="hd">
      <h1>状元楼</h1>
      <ul>
      </ul>
    </div>
    <div class="bd">
      <ul class="picList">
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic5.jpg" /></a></div>
          <div class="titles"><span class="zyname"><a href="#" target="_blank">北京文科状元</a></span><br />
            <span class="zyinfo"> 昵称：喵喵<br />
            学校：清华大学<br />
            积分：<a href="#">835</a></span></div>
        </li>
      </ul>
    </div>
  </div>
  <script type="text/javascript">
		jQuery(".picScroll-left1").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
		</script>
</div>
<!--学霸天地-->
<div class="schoolpa">
  <div class="schoolcolumn">
    <div class="world">
      <div class="title5">
        <h1>学霸天地</h1>
        <h2 id="two1" onmouseover="setTab('two',1,3)" class="hover"><a href="#">本周学霸</a></h2>
        <h2 id="two2" onmouseover="setTab('two',2,3)"><a href="#">本月学霸</a></h2>
        <h2 id="two3" onmouseover="setTab('two',3,3)"><a href="#">年度学霸</a></h2>
      </div>
      <div class="pashow" id="con_two_1">
        <ul>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
        </ul>
      </div>
      <div class="pashow" id="con_two_2" style="display:none">
        <ul>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
        </ul>
      </div>
      <div class="pashow" id="con_two_3" style="display:none">
        <ul>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
          <li> <a href="#">
            <div class="papic"><img src="/homes/images/pic6.jpg" width="156" /><span class="patitle">学学习习</span><span class="patx"></span></div>
            <div class="pajf">积分：<font class="f_blue">835</font></div>
            </a> </li>
        </ul>
      </div>
      <div><a href="#"><img src="/homes/images/ad3.jpg" /></a></div>
    </div>
  </div>
  <!--学霸总排行-->
  <div class="right269">
    <div class="picScroll-top">
      <div class="hd">
        <h1>学霸总排行</h1>
        <h2>TOP</h2>
        <a class="next"></a>
        <ul>
        </ul>
        <a class="prev"></a> </div>
      <div class="bd">
        <ul class="picList">
          <li>
            <div class="xbpm">1</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon1.jpg" /></span></div>
          </li>
          <li>
            <div class="xbpm">2</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon.jpg" /></span></div>
          </li>
          <li>
            <div class="xbpm">3</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon1.jpg" /></span></div>
          </li>
          <li>
            <div class="xbpm1">4</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon.jpg" /></span></div>
          </li>
          <li>
            <div class="xbpm1">5</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon1.jpg" /></span></div>
          </li>
          <li>
            <div class="xbpm1">6</div>
            <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic7.jpg" width="50"  height="42" /></a><span><img src="/homes/images/xbg.jpg" /></span></div>
            <div class="titlei1"><span class="phname"><a href="#" target="_blank">十年寒窗</a><br />
              <span class="phjf">积分：835</span><span class="phtx"><img src="/homes/images/xbicon.jpg" /></span></div>
          </li>
        </ul>
      </div>
    </div>
    <script type="text/javascript">
		 jQuery(".picScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:5,trigger:"click"});
		</script>
  </div>
</div>
<!--问题解答and难题悬赏-->
<div class="wenti">
  <div class="wenticolumn">
    <div class="title6">
      <h1>问题解答</h1>
	  <div class="change"><a href="#">更多</a></div>
    </div>
    <div class="wtjdlist">
      <div class="toppic"><img src="/homes/images/pic10.jpg" /></div>
      <ul>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
        <li><span><a href="#">8回答</a></span>·<a href="#">中考语文古诗词鉴赏题型及解题技巧?</a></li>
      </ul>
    </div>
  </div>
  <div class="wenticolumn" style="float:right;">
    <div class="txtScroll-top">
      <div class="hd">
        <h1>难题悬赏</h1>
        <ul>
        </ul>
      </div>
      <div class="bd">
        <ul class="infoList">
          <li><span class="icon"><img src="/homes/images/qiang.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/ji.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
          <li><span class="icon"><img src="/homes/images/arrow.jpg" /></span><a href="#" target="_blank">钢铁是怎样炼成的读怎样炼成的读怎样炼成的读后了我的提感400字</a><span class="jb">25</span></li>
        </ul>
      </div>
    </div>
    <script type="text/javascript">
		jQuery(".txtScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:7});
		</script>
  </div>
</div>


<!--课件超市-->
<div class="kjcs">
  <div class="picScroll-left4">
    <div class="hd">
      <h1>课件超市</h1>
      <ul>
      </ul>
    </div>
    <div class="bd">
      <ul class="picList">
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="hot"><img src="/homes/images/jp.png" /></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="hot"><img src="/homes/images/jp.png" /></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="hot"><img src="/homes/images/jp.png" /></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="hot"><img src="/homes/images/jp.png" /></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
        <li>
          <div class="pic"><a href="#" target="_blank"><img src="/homes/images/pic9.jpg" /></a><span class="titleis"><a href="#" target="_blank">清华大学</a></span><span class="down"><a href="#"><img src="/homes/images/down.png" /></a></span></div>
          <div class="titleis">
            <div class="jiage"><a href="#">￥15</a></div>
            <div class="playtime"><a href="#">74,308次播放</a> | <a href="#">1,629次评论</a></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <script type="text/javascript">
		jQuery(".picScroll-left4").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:5,trigger:"click"});
		</script>
</div>
<div class="ad">
  <div class="fl"><a href="#"><img src="/homes/images/ad.jpg" /></a></div>
  <div class="fr"><a href="#"><img src="/homes/images/ad1.jpg" /></a></div>
</div>
<!--浮动导航-->
<DIV id=xixi onmouseover=toBig() onmouseout=toSmall()>
  <TABLE style="FLOAT: left" border=0 cellSpacing=0 cellPadding=0 width=57>
  <TR>
    <TD>
<div class="to_top">
  <div class="tt_hd"><a href="#" class="wcup" target="_blan.00k"><img src="/homes/images/nav1.jpg"></a></div>
  <div class="tt_cont">
  <a href="Member.aspx?mid=0" class="mt0" target="_blank">用户</a>
  <a href="classList.aspx" class="mt1" target="_blank">班级</a>
  <a href="#" class="mt2" target="_blank">课程</a>
  <a href="#" class="mt3" target="_blank">收藏</a>
  <a href="#" class="mt4" target="_blank">记录</a>
  <a href="#" class="mt5" target="_blank">通知</a>
  <a href="#" class="mt6" target="_blank">咨询</a>
  <a id="scrollto" href="#"><img src="/homes/images/topn.jpg" /></a> </div>
</div>
<script type="text/javascript">
    window.onscroll = function () {
        if (document.documentElement.scrollTop + document.body.scrollTop > 500) {
            document.getElementById("scrollto").style.display = "block";
        }
        else {
            document.getElementById("scrollto").style.display = "none";
        }
    }
</script>
</TD></TR>
</TABLE>
<DIV class=Obtn></DIV></DIV>
<SCRIPT language=javascript src="/homes/js/index_left_nav.js"></SCRIPT>
<!--浮动导航-->
@endsection