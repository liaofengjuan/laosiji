@extends('layout.admin')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        Amaze UI 表单
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="am-active">新增管理员</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-code"></span> 表单
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                <div class="portlet-input input-small input-inline">
                    <div class="input-icon right">
                        <i class="am-icon-search"></i>
                        <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                </div>
            </div>


        </div>
        <div class="tpl-block ">

            <div class="am-g tpl-amazeui-form">


                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="username" class="am-u-sm-3 am-form-label">用户名</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="yyyy" name="username" value="" id="username" placeholder="请输入用户名" >
                                <small class='little'>用户名</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="password" class="am-u-sm-3 am-form-label">密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" name="password" id="password" placeholder="请输入密码">
                                <small class='little'>输入你的名字，让我们记住你。</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="repass" class="am-u-sm-3 am-form-label">确认密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" name="repass" id="repass" placeholder="请输入确认密码">
                                <small class='little'>输入你的名字，让我们记住你。</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="phone" class="am-u-sm-3 am-form-label">手机号</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="phone" id="phone" placeholder="请输入手机号">
                                <small>输入你的名字，让我们记住你。</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="email" class="am-u-sm-3 am-form-label">邮箱</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="email" id="email" placeholder="请输入邮箱">
                                <small>输入你的名字，让我们记住你。</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary">保存修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="/admins/js/jquery.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>
<script type="text/javascript">
    //定义正则模式
    var preg_user = /^[a-zA-Z]\w{5,17}$/;

    //标识符
    var is_user = false;

    //当获取焦点时提示信息
    $('input[name=username]').focus(function(){
        layer.tips('6~18个字符，可使用字母、数字、下划线，需以字母开头，区分大小写', $(this));
    }).blur(function(){
        //获取内容  
        var username = $(this).val();
        if(preg_user.test(username){
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


</script>