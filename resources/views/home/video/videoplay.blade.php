@extends('home.layout.header_footer')
@section('content')
<link href="/homes/css/whir_styles.css" rel="stylesheet" type="text/css" />

<!--container-->
<div class="player_container">
  <div class="mod_crumbs"> <a href="#" target="_blank"title="首页">首页</a>&gt; <a href="javascript:;" target="_blank" title="大学时代">大学时代</a> </div>
  <h1 class="mod_player_title" title="大学时代">大学时代</h1>
  <!--视频播放及相关视频-->
  <div class="mod_player_section cf" id="mod_inner">
    <div class="mod_player" id="mod_player">

      <div class="main-wrap">
        <video src="{{env('PATH_IMG').$data->play}}" poster="{{env('PATH_IMG').$data->pic}}" autoplay controls loop></video>
      </div>

    </div>
    <div class="mod_video_album_section mod_video_album_section_v3" id="fullplaylist">
      <div class="mod_video_list_section ui_scroll_box mod_video_list_section_2">
        <div class="mod_video_list_content ui_scroll_content" id="mod_videolist">
          <div class="album_title">
            <h1>相关视频</h1>
          </div>
          <ul>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
            <li class="item"> <a class="item_link" href="#" title="台妹为何不嫁大陆男" > <span class="album_pic"> <img width="117px" height="65px" src="/homes/images/playimg.jpg" alt="台妹为何不嫁大陆男"> <span class="figure_mask"> <em class="mask_txt">01:06</em> </span> </span>
              <div class="video_title"><strong>台妹为何不嫁大陆男</strong><br />
                播放：12556次<br />
                评论：1554次</div>
              </a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--点赞-->
  <div class="agree"> <span class="dzsc"><a href="#" class="dianz">80</a><a href="#" class="kdsc">收藏</a></span> <span class="fenx">
    <div class="bshare-custom icon-medium">
      <div class="bsPromo bsPromo2"></div>
      <a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div>
   
    </span> <span class="cishu"><img src="/homes/images/gkcs.jpg" />&nbsp;&nbsp;4.245播放</span> <span style="float:right; margin-top:30px;">
    <input type="image" src="/homes/images/zxpc.jpg" style="float:left; margin-right:10px;" />
    <input type="image" src="/homes/images/xxbj.jpg" style="float:left;" />
    </span> </div>
  <!--视频简介-->
  <div class="playerjj">
    <ul>
      <li>
        <div class="upname">
          <div class="upnameimg"><img src="/homes/images/upname.jpg" width="61" height="60"/></div>
          <div class="upnamet">昵称:<a href="#">拍客现场</a><br />
            <img src="/homes/images/xbg.jpg" /></div>
        </div>
        <div class="upinfo">
          <h1>视频简介:</h1>
          <p>8月16日，一场名为“帆帆加油，生命接力”的演出在糖果星光现场举行，义演的票务收入将通过公证转交给主办方中华少年儿童慈善救助基金会，用于十二岁淋巴瘤患者岳帆的救助。8月16日，一场名为“帆帆加油，生命接力”的演出在糖果星光现场举行，义演的票务收入将通过公证转交给主办方中华少年儿童慈善救助基金会，用于十二岁淋巴瘤患者岳帆的救助。</p>
          <span>9小时前 上传</span> </div>
      </li>
    </ul>
  </div>
</div>
<div class="clear"></div>
<!--留言-->
<div class="lybox">
  <div class="guestbook">
    <div class="left868">
      <!--留言板-->
      <div class="fbpl">
        <div class="plr"><span class="pltx"><a href="#"><img src="/homes/images/upname.jpg" width="61" height="61" /></a></span><span class="plname"><a href="#">Star_moon66250919</a></span><span class="plnum">所有评论<a href="#"> 21</a></span></div>
        <textarea name="textarea" class="input4"></textarea>
        <input type="image" src="/homes/images/fbpl.jpg" style="margin-left:25px;" />
      </div>
      <!--留言列表-->
      <div class="lylist">
        <div class="title1" style="margin-top:0">
          <h1 style="padding-left:0">全部评论（21）</h1>
          <div class="plpage">
            <div class="page1"><span class="num"><font class="f_blue">1</font>/41</span><span class="prev">上一页</span><span class="next"><a href="#">下一页</a></span> </div>
          </div>
        </div>
        <ul class="pllist">
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
          <li>
            <div class="lyimg"><a href="#"><img src="/homes/images/grzx/lyimg.jpg" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">huo_zhenying</a></span></div>
              <div class="gxqm">为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多为什么不叫汪峰来更火 募捐的人更多</div>
              <div class="reque">36分钟前 来自iPad客户端 <span class="zhuanfa"><a href="#">转发</a><a href="#">回复</a></span></div>
            </div>
          </li>
        </ul>
        <div class="page"><span class="prev">上一页</span><span class="num"><a href="#" class="on">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a></span><span class="next"><a href="#">下一页</a></span><em>217/5</em>转到
          <input name="textfield" type="text" value="5" class="inputpage"/>
          页
          <input type="submit" name="Submit" value="GO" class="btngo"/>
        </div>
      </div>
    </div>
    <!--推荐视频-->
    <div class="right306">
      <div class="title2">
        <h1 style="background:none;height:auto;line-height:35px;width:auto;border:none">推荐视频</h1>
      </div>
      <div class="tjlist">
        <ul>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
          <li>
            <div class="tjimg"><img src="/homes/images/my.jpg" width="138" height="83" /><span class="bftime">02:10</span></div>
            <div class="tjinfo">
              <h2><a href="#">快闪撑同志！LES美女映像节现场结婚！！</a></h2>
              <span>12万次播放</span></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript" src="/homes/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/homes/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/homes/js/index_solid.js"></script>
<script type="text/javascript" src="/homes/js/column.js"></script> -->
@endsection