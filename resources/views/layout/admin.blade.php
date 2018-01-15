<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/admins/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/admins/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/admins/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admins/css/admin.css">
    <link rel="stylesheet" href="/admins/css/app.css">
   

    
</head>

<body data-type="index">


    <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="javascript:;" class="tpl-logo">
                <img src="/admins/img/logo.png" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
                
                
                
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="tpl-header-list-user-nick">{{session('user')}}</span><span class="tpl-header-list-user-ico"> <img src="" onerror="javascript:this.src='/admins/img/user01.png'"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#"><span class="am-icon-bell-o"></span> 资料</a></li>
                        <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                        <li><a href="javascript:;" onclick="signout()"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" class="tpl-header-list-link" onclick="signout()" ><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span>安全退出</a></li>
            </ul>
        </div>
    </header>

    





    <div class="tpl-page-container tpl-page-header-fixed" >


        <div class="tpl-left-nav tpl-left-nav-hover l-height" >
            <!--<div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable" style="text-align: center;">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/admins/img/user04.png" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
                    <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                        {{session('user')}}
                    </span>
                    
                </div>
            </div>-->

            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="index.html" class="nav-link active">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-user"></i>
                            <span>用户管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right "></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu yonghu">
                            <li>
                                <a href="{{url('admin/user')}}" target='main'>
                                    <i class="am-icon-angle-right"></i>
                                    <span>浏览前台用户</span>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <a href="{{url('admin/user/hander')}}" target='main'>
                                    <i class="am-icon-angle-right"></i>
                                    <span>浏览管理员用户</span>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                                <a href="{{url('admin/user/create')}}" target="main">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加管理员</span>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-tree"></i>
                            <span>视频分类</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu fenlei">
                            <li>
                                <a href="{{url('/admin/videoType')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>分类列表</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="{{url('/admin/videoType/create')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加父类</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-video-camera"></i>
                            <span>视频管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu shiguan">
                            <li>
                                <a href="{{url('/admin/video')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>视频列表</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="{{url('/admin/video/create')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>发布视频</span>
                                </a>
                                <a href="{{url('/admin/video/review')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>审核视频</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-codepen"></i>
                            <span>轮播图管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu slideshow">
                            <li>
                                <a href="{{url('/admin/slideshow')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>轮播图列表</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="{{url('/admin/slideshow/create')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加轮播图</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-codepen"></i>
                            <span>广告管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu guanggao">
                            <li>
                                <a href="table-font-list.html">
                                    <i class="am-icon-angle-right"></i>
                                    <span>广告列表</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="table-images-list.html">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加广告</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-shekel"></i>
                            <span>友情链接</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu friendlink">
                            <li>
                                <a href="{{url('/admin/friend')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>浏览友情链接</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>

                                <a href="{{url('/admin/friend/create')}}">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加友情链接</span>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-cog"></i>
                            <span>网站配置</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="table-font-list.html">
                                    <i class="am-icon-angle-right"></i>
                                    <span>网站配置</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>



<script src="/admins/js/jquery.min.js"></script>
<script src="/admins/js/echarts.min.js"></script>
<script src="/admins/js/amazeui.min.js"></script>
<script src="/admins/js/iscrolls.js"></script>
<script src="/admins/js/app.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>
  <script type="text/javascript">
        //用户管理模块
       var preg_user = /^\/admin\/user.*$/;
       var path = window.location.pathname;
       if(preg_user.test(path)){
           $('.yonghu').css('display','block');
       }
       //视频分类/admin/videoType
       var preg_type = /^\/admin\/videoType.*$/;
       
       if(preg_type.test(path)){
           $('.fenlei').css('display','block');
       }
       //视频/admin/video
       var preg_video = /^\/admin\/video\/.*$/;
       var preg_video1 = /^\/admin\/video$/;
       
       if(preg_video.test(path)){
           $('.shiguan').css('display','block');
       }
       if(preg_video1.test(path)){
           $('.shiguan').css('display','block');
       }
       //友情链接
       var preg_friend = /^\/admin\/friend.*$/;
       
       if(preg_friend.test(path)){
           $('.friendlink').css('display','block');
       }

       var preg_slideshow = /^\/admin\/slideshow.*$/;
       if(preg_slideshow.test(path)){
           $('.slideshow').css('display','block');
       }
    
    //执行退出
    function signout(){
        $.post('/admin/login/signout',{'_token':'{{csrf_token()}}'},function(data){
            if(data=='0'){
                alert('恭喜，退出成功');
                window.location.href = '/admin/login';
            }else{
                alert('抱歉，退出失败');
            }
        })
    }
 </script>
        
            @section('content')
            
            @show
        

    </div> 
</body>

</html>