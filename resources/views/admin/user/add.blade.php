@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="am-active">新增管理员</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-plus"></span> 新增管理员
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                
            </div>


        </div>
        <div class="tpl-block ">

            <div class="am-g tpl-amazeui-form">


                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal" >
                        <div class="am-form-group">
                            <label for="username" class="am-u-sm-3 am-form-label">用户名</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="yyyy" name="username" value="{{old('username')}}" id="username" placeholder="请输入用户名" >
                                <small class='little'></small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="password" class="am-u-sm-3 am-form-label">密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" name="password" id="password" placeholder="请输入密码">
                                <small class='little'></small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="repass" class="am-u-sm-3 am-form-label">确认密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" name="repass" id="repass" placeholder="请输入确认密码">
                                <small class='little'></small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="phone" class="am-u-sm-3 am-form-label">手机号</label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{old('phone')}}" name="phone" id="phone" placeholder="请输入手机号">
                                <small class='little'></small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="email" class="am-u-sm-3 am-form-label">邮箱</label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{old('email')}}" name="email" id="email" placeholder="请输入邮箱">
                                <small class='little'></small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary">新增管理员</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    

    //标识符
    var is_user = false;
    var is_pwd = false;
    var is_repass = false;
    var is_phone = false;
    var is_email = false;

    //判断用户名
    $('input[name=username]').focus(function(){
        $('.little:eq(0)').html("<font color='orange'>6~18个字符，可使用字母、数字、下划线，需以字母开头，区分大小写</font>");
    }).blur(function(){
        //定义正则模式
         var preg_user = /^[a-zA-Z]\w{5,17}$/;
       //获取内容  
         var username = $(this).val();
        if(preg_user.test(username)){
            $.post('/admin/user/username',{'username':username,'_token':'{{csrf_token()}}'},function(data){
                    if(data==0){
                        $('.little:eq(0)').html("<font color='green'>用户名可用</font>");
                        is_user = true;
                    }else{
                        $('.little:eq(0)').html("<font color='red'>用户名已存在</font>");
                        is_user = false;
                    }
                })
        }else{
            $('.little:eq(0)').html("<font color='red'>用户名不合法</font>");
            is_user = false;
        }
    })
    
    //判断密码
    $('input[name=password]').focus(function(){
        $('.little:eq(1)').html("<font color='orange'>6~18个位，区分大小写</font>");
    }).blur(function(){
        var preg_pwd = /^\S{6,18}$/;
        var pwd = $(this).val();
        if(preg_pwd.test(pwd)){
            $('.little:eq(1)').html("<font color='green'>密码可用</font>");
            is_pwd = true;
        }else{
             $('.little:eq(1)').html("<font color='red'>密码不合法</font>");
            is_pwd = false;
        }
    })

    //确认密码
    $('input[name=repass]').focus(function(){
        $('.little:eq(2)').html("<font color='orange'>6~18个位，区分大小写</font>");
    }).blur(function(){
        var preg_pwd = /^\S{6,18}$/;
        var repass = $(this).val();
        var pwd = $('input[name=password]').val();
        if(preg_pwd.test(repass)){
            if(repass==pwd){
                $('.little:eq(2)').html("<font color='green'>密码可用</font>");
                is_repass = true;
            }else{
                $('.little:eq(2)').html("<font color='red'>密码不一致</font>");
                 is_repass = false;
            }
        }else{
             $('.little:eq(2)').html("<font color='red'>密码不合法</font>");
            is_repass = false;
        }
    })

    //判断手机号
    $('input[name=phone]').focus(function(){
        $('.little:eq(3)').html("<font color='orange'>请输入正确的手机号，方便密码找回</font>");
    }).blur(function(){
        //定义正则模式
         var preg_phone = /^[1][0-9]{10}$/;
       //获取内容  
        var phone = $(this).val();
        if(preg_phone.test(phone)){
            $.post('/admin/user/phone',{'phone':phone,'_token':'{{csrf_token()}}'},function(data){
                    if(data==0){
                        $('.little:eq(3)').html("<font color='green'>手机号可用</font>");
                        is_phone = true;
                    }else{
                        $('.little:eq(3)').html("<font color='red'>手机号已存在</font>");
                        is_phone = false;
                    }
                })
        }else{
            $('.little:eq(3)').html("<font color='red'>手机号不合法</font>");
            is_phone = false;
        }
    })

    //判断邮箱
    $('input[name=email]').focus(function(){
        $('.little:eq(4)').html("<font color='orange'>请输入正确的邮箱地址</font>");
    }).blur(function(){
        //定义正则模式
        var preg_email = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
       //获取内容  
        var email = $(this).val();
        if(preg_email.test(email)){
            $('.little:eq(4)').html("<font color='green'>邮箱可用</font>");
            is_email = true;      
        }else{
            $('.little:eq(4)').html("<font color='red'>邮箱不合法</font>");
            is_email = false;
        }
    })

    $('button[type=button]').click(function(){
        
        if(is_user && is_pwd && is_repass && is_phone && is_email){
            var username = $('input[name=username]').val();
            var password = $('input[name=password]').val();
            var phone = $('input[name=phone]').val();
            var email = $('input[name=email]').val();
            $.post('/admin/user',{'username':username,'password':password,'phone':phone,'email':email,'_token':'{{csrf_token()}}'},function(data){
                    // 判断
                    if(data==0){
                        alert('恭喜，注册成功');
                        window.location.href = '/admin/user';
                       
                        // alert(2);
                        // location.href = '/admin/user';
                    }else{
                        return false;
                    }

             }) 

        }else{
        }
    })
    
</script>
@endsection