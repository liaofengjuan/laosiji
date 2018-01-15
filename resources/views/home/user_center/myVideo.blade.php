@extends('home.layout.center')
@section('right')
  <div class="right840">
    <div class="title7">
      <h1>我的视频</h1>
      <div class="nysearchbox">
        <input type="text" value="页内搜索" onFocus="this.value='';" onBlur="if(this.value==''){this.value='页内搜索';}" name="" class="input6"/>
        <input type="image" src="/homes/images/grzx/btn4.jpg" class="btn5" />
      </div>
    </div>
    <div class="biji">
      <div class="bijicz">
        <div class="bjsc"><img src="/homes/images/grzx/scicon.jpg" /><a href="#">上传视频</a></div>
        <div class="bjsc"><img src="/homes/images/grzx/ydicon.jpg" /><a href="#">移到班级</a></div>
        <div class="bjsc"><img src="/homes/images/grzx/bjsc.jpg" /><a href="#">删除</a></div>
        <div class="bjpage">
          <div class="page1"><span class="prev">上一页</span><span class="num"><a href="#" class="on">1</a><a href="#">2</a></span><span class="next"><a href="#">下一页</a></span> </div>
        </div>
      </div>
    </div>
    <!--视频信息-->
    <div class="sptitle">
      <div class="wdspxx">
        <input type="checkbox" class="input11" />
        视频信息</div>
      <div class="wdsppx"><font class="f_black">排序：</font>上传时间&nbsp;<img src="/homes/images/grzx/bjpx.jpg" /></div>
      <div class="wdspzt">状态</div>
      <div class="wdspzt">热度</div>
      <div class="wdspcz">操作</div>
    </div>
    <ul class="wdsplist">
      <li> <span class="checkbox">
        <input type="checkbox" class="input12" />
        </span>
        <div class="wdsp"><a href="#"><img src="/homes/images/grzx/gktv.jpg" /></a><span class="gktime">02:10</span></div>
        <div class="wddate"><span><a href="#">人力资源管理与实务教材</a></span><span>2014-08-08 08:47</span></div>
        <div class="spfb">已发布</div>
        <div class="wddp"><span><img src="/homes/images/grzx/wdgk.jpg" /><a href="#">1333</a></span><span><img src="/homes/images/grzx/wddp.jpg" /><a href="#">1333</a></span></div>
        <div class="wdcz"><a href="#">编辑</a></div>
      </li>
      <li class="libg"> <span class="checkbox">
        <input type="checkbox" class="input12" />
        </span>
        <div class="wdsp"><a href="#"><img src="/homes/images/grzx/gktv.jpg" /></a><span class="gktime">02:10</span></div>
        <div class="wddate"><span><a href="#">人力资源管理与实务教材</a></span><span>2014-08-08 08:47</span></div>
        <div class="spfb">已发布</div>
        <div class="wddp"><span><img src="/homes/images/grzx/wdgk.jpg" /><a href="#">1333</a></span><span><img src="/homes/images/grzx/wddp.jpg" /><a href="#">1333</a></span></div>
        <div class="wdcz"><a href="#">编辑</a></div>
      </li>
    </ul>
  </div>
</div>
@endsection