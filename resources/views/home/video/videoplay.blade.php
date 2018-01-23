@extends('home.layout.header_footer')
@section('sc')
@endsection
@section('content')
<link href="/homes/css/whir_styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>

<!--container-->
<div class="player_container">
  <div class="mod_crumbs"> <a href="/" target="_blank" title="首页">首页</a>&gt;</div>
  <h1 class="mod_player_title" title="{{$data['video_title']}}">{{$data['video_title']}}</h1>
  <!--视频播放及相关视频-->
  <div class="mod_player_section cf" id="mod_inner">
    <div class="mod_player" id="mod_player">

    @if($vip == '2')
    <div class="main-wrap">
      <a href="/center/self/vip">
        <video src="" poster="/homes/images/jxvip.png" autoplay controls loop></video>
      </a>
    </div>
    @else
    <div class="main-wrap">
      <video src="{{env('PATH_IMG').$data['play']}}" poster="{{env('PATH_IMG').$data->pic}}" autoplay controls loop></video>
    </div>
    @endif
     

    </div>
    <div class="mod_video_album_section mod_video_album_section_v3" id="fullplaylist">
      <div class="mod_video_list_section ui_scroll_box mod_video_list_section_2">
        <div class="mod_video_list_content ui_scroll_content" id="mod_videolist">
          <div class="album_title">
            <h1>相关视频</h1>
          </div>
          <ul>
            @foreach($xiangguan as $v)
            <li class="item"> <a class="item_link" href="/video/play/index/{{$v['id']}}" title="{{$v['video_title']}}" > <span class="album_pic"> <img width="117px" height="65px" src="{{env('PATH_IMG').$v['pic']}}" onerror="javascript:this.src='/homes/images/3.jpg'"> <span class="figure_mask"> <em class="mask_txt">{{$v['size']}}</em> </span> </span>
              <div class="video_title"><strong>{{$v['video_title']}}</strong><br />
                播放：{{$v['clicks']}}次<br />
                </div>
              </a> </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--点赞-->
  <div class="agree"> <span class="dzsc"><a onclick="dianzz({{$data['id']}})" href="javascript:void(0);" class="dianz">{{$data['good']}}</a></span> <span class="fenx">
    <div class="bshare-custom icon-medium">
      <div class="bsPromo bsPromo2"></div>
      <a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div>
   
    </span> <span class="cishu"><img src="/homes/images/gkcs.jpg" />&nbsp;&nbsp;{{$data['clicks']}} 次播放</span> <span style="float:right; margin-top:30px;">
    
    </span> </div>
  <!--视频简介-->
  <div class="playerjj">
    <ul>
      <li>
        <div class="upname">
          <div class="upnameimg"><img src="{{env('PATH_IMG').$data->userinfo['pic']}}" onerror="javascript:this.src='/homes/images/my_moren.jpg'" width="61" height="60"/></div>
          <div class="upnamet">用户名:<a href="javacript:void(0);">{{$data->user['username']}}</a><br />
            </div>
        </div>
        <div class="upinfo">
          <h1>视频简介:</h1>
          <p>{{$data['info']}}</p>
          <span>{{date('Y-m-d H:i:s',$data['created_at'])}} 上传</span> </div>
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
        <div class="plr"><span class="pltx"><a href="#"><img src="{{env('PATH_IMG').session('pic')}}" onerror="javascript:this.src='/homes/images/my_moren.jpg'" width="61" height="61" /></a></span><span class="plname"><a href="#">{{session('user')}}</a></span><span class="plnum">所有评论<a href="#"> {{$count}}</a></span></div>
        <textarea name="textarea" class="input4 txtinp"></textarea>
        @if(session('user'))
        <input class="tutih"  type="image" src="/homes/images/fbpl.jpg" style="margin-left:25px;" />
        @else
        <font color="red">&nbsp;&nbsp;&nbsp;&nbsp;登陆后才能回复！</font>
        @endif
      </div>
      <!--留言列表-->
      <div class="lylist">
        <div class="title1" style="margin-top:0">
          <h1 style="padding-left:0">全部评论（{{$count}}）</h1>
          <div class="plpage">
            
          </div>
        </div>
        <ul class="pllist">
          <!-- 回复 -->
          @foreach($comment as $v)
          <li>
            <div class="lyimg"><a href="#"><img src="{{env('PATH_IMG').$data->userinfo['pic']}}" onerror="javascript:this.src='/homes/images/my_moren.jpg'" /></a></div>
            <div class="lyinfo">
              <div class="lyname"><span class="myname"><a href="#">{{$v->user['username']}}</a></span></div>
              <div class="gxqm">{{$v['content']}}</div>
              <div class="reque">
                <span class="zhuanfa zhhuifu">
                  {{date('Y-m-d H:i:s',$v['created_at'])}}
                  @if(session('user'))
                  <a class="aaa1" href="#">回复</a>
                  @else
                  <a href="#"></a>
                  @endif
                  <a class="aaa2" href="javascript:void(0);">展开回复</a>
                </span>
                
                <span class="yinchuif" style='display:none'>
                <textarea class="neirhf" name="" id="" cols="60" rows="2"></textarea>
                <input class="huifu44" style="margin-bottom:20px;width:50px;height:20px;cursor:pointer" type="button" value="回复" />
                <input type="hidden" name="cunid" value="{{$v['id']}}">
                </span>

              </div>
            </div>
          </li>
          <span></span>
          @endforeach
        </ul>
        
        <div class="myfenye">{!! $comment->render() !!}</div>

      </div>
    </div>
    <!--推荐视频-->
    <div class="right306">
      <div class="title2">
        <h1 style="background:none;height:auto;line-height:35px;width:auto;border:none">推荐视频</h1>
      </div>
      <div class="tjlist">
        <ul>
          @foreach($tuijian as $v)
          <li>
            <div class="tjimg"><img src="{{env('PATH_IMG').$v['pic']}}" onerror="javascript:this.src='/homes/images/3.jpg'" width="138" height="83" /><span class="bftime">{{$v['size']}}</span></div>
            <div class="tjinfo">
              <h2><a href="/video/play/index/{{$v['id']}}">{{$v['video_title']}}</a></h2>
              <span>{{$v['clicks']}}次播放</span></div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  //点赞
  function dianzz(vid)
  {
    $.post('/reply/goods',{id:vid,_token:'{{csrf_token()}}'},function(data){
      if(data == 'cuo')
      {
        alert('点赞失败!');
      }else{
        $('.dianz').text(data);
        alert('点赞成功！');
      }
    })
  }

  //盖楼框
  $('.pllist').on('click','.zhhuifu .aaa1',function(){
    if($(this).text() == '回复')
    {
      $(this).text('取消回复');
      $(this).parent().next().css('display','block');
      return false;
    }else if($(this).text() == '取消回复'){
      $(this).text('回复');
      $(this).parent().next().css('display','none');
      return false;
    }
  });
  

  //回复后动态添加回复内容
  $('.tutih').click(function(){
    var cont = $('.txtinp').val();
    Date.prototype.Format = function (fmt) { //author: meizz 
        var o = {
            "M+": this.getMonth() + 1, //月份 
            "d+": this.getDate(), //日 
            "h+": this.getHours(), //小时 
            "m+": this.getMinutes(), //分 
            "s+": this.getSeconds(), //秒 
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
            "S": this.getMilliseconds() //毫秒 
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }

    var t = new Date().Format("yyyy-MM-dd hh:mm:ss");
    // console.log(t);
    $.post('/reply/addcomment',{cont:cont,vid:'{{$data["id"]}}',_token:'{{csrf_token()}}'},function(msg){
      if(msg == '44')
      {
        alert('您已被禁言！')
      }else if(msg == '3')
      {
        alert('评论失败！');
      }else if(msg){
        // console.log(msg['content'])
        $('.pllist').prepend('<li><div class="lyimg"><a href="#"><img src="'+'{{env("PATH_IMG")}}'+'{{session("pic")}}'+'" onerror="javascript:this.src=\''+'/homes/images/my_moren.jpg'+'\'" /></a></div><div class="lyinfo"><div class="lyname"><span class="myname"><a href="#">'+'{{session("user")}}'+'</a></span></div><div class="gxqm">'+msg['content']+'</div><div class="reque"><span class="zhuanfa zhhuifu">'+t+'<a class="aaa1" href="#">回复</a><a class="aaa2" href="javascript:void(0);">展开回复</a></span><span class="yinchuif" style="display:none"><textarea class="neirhf" name="" id="" cols="60" rows="2"></textarea><input class="huifu44" style="margin-bottom:20px;width:50px;height:20px;cursor:pointer" type="button" value="回复" /><input type="hidden" name="cunid" value="'+msg['id']+'"></span></div></div></li><span></span>'
          )
      }
    })
  })
  
  //执行回复
  $('.pllist').on('click','.huifu44',function(){
    var content = $(this).prev().val();
    var comment_id = $(this).next().val();
    var th = $(this);
    $.post('/reply/insreply',{comment_id:comment_id,content:content,_token:'{{csrf_token()}}'},function(data){
      if(data == '44')
      {
        alert('您已被禁言！');
      }else if(data == '2')
      {
        alert('回复失败!');
        return;
      }else{
        tjhuifu(data,th);     
      }
    })

  })

  //显示回复/关闭回复
  $('.pllist').on('click','.zhhuifu .aaa2',function(){
    var th = $(this);
    var comment_id = $(this).parent().next().children().eq(2).val();
    if($(this).text() == '展开回复')
    {
      $(this).text('收起回复');
      //发送ajax获取回复
      $.post('/reply/greply',{comment_id:comment_id,_token:'{{csrf_token()}}'},function(data){
        tjhuifu(data,th);
      });
      
    }else if($(this).text() == '收起回复'){
      $(this).text('展开回复');
      th.parent().parent().parent().parent().next().empty();
    }
  })

  // 获取该评论所有回复并添加
  function tjhuifu(data,obj)
  {
      obj.parent().parent().parent().parent().next().empty();
      for(var i=0;i<data.length;i++)
      {
        obj.parent().parent().parent().parent().next().prepend('<li style="background-color:pink"><div class="lyimg"><a href="#"><img src="'+'{{env("PATH_IMG")}}'+data[i].pic+'"  onerror="javascript:this.src=\''+'/homes/images/my_moren.jpg'+'\'" /></a></div><div class="lyinfo"><div class="lyname"><span class="myname"><a href="#">'+data[i].username+' 回复：</a></span></div><div class="gxqm">'+data[i].content+'</div><div class="reque"> <span class="zhuanfa"><a href="#"></a><a href="#"></a>'+data[i].time+'</span></div></div></li>');
      }
  }
</script>
<li>
            
@endsection