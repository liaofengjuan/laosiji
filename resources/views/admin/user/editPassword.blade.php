@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="am-active">修改密码</li>
    </ol>
<div class="tpl-portlet-components" >
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-paint-brush"></span> 修改密码
        </div>
    </div>
    <div class="tpl-block" >

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group" style="margin-top:50px">
                        <label for="username" class="am-u-sm-3 am-form-label">用户名</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="username" value="{{$data['username']}}" id="username" disabled >
                        </div>
                    </div>
                    <div class="am-form-group" style="margin-top:35px">
                        <label for="oldPass" class="am-u-sm-3 am-form-label">当前密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="oldPass" value="" id="oldPass"  >
                        </div>
                    </div>
                    <div class="am-form-group" style="margin-top:35px">
                        <label for="newPass" class="am-u-sm-3 am-form-label">新密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="newPass" value="" id="newPass"  >
                            <small>6-18位非空白字符</small>
                        </div>
                    </div>
                    <div class="am-form-group" style="margin-top:25px">
                        <label for="reNewPass" class="am-u-sm-3 am-form-label">确认新密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="reNewPass" value="" id="reNewPass"  >
                            <small>6-18位非空白字符</small>
                        </div>
                    </div>
                    <div class="am-form-group" style="margin-top:50px">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-warning am-round" style="width:430px;letter-spacing:100px;padding-left:100px" >提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<script type="text/javascript">
    //判断密码
    $('button[type=button]').click(function(){
        //获取值
        var oldPass = $('input[name=oldPass]').val();
        var newPass = $('input[name=newPass]').val();
        var reNewPass = $('input[name=reNewPass]').val();
        var id = {{$id}};

        //判断是否为空
        if(oldPass!='' &&　newPass!='' &&　reNewPass!=''){
        }else{
            layer.msg('密码不能为空！');
            return;
        }

        //判断两次密码是否一致
        if(newPass != reNewPass){
            layer.msg('两次密码输入不一致！');
            return;
        }

        //判断密码格式是否正确
        var reg = /^\S{6,18}$/;
        if(!reg.test(newPass)){
            layer.msg('新密码格式不正确，请重新输入！');
            return;
        }

        //发送ajax
        $.post('{{"/admin/user/doPass/".$id}}',{'oldPass':oldPass,'newPass':newPass,'_token':'{{csrf_token()}}'},function(data){
           switch(data)
            {
                case '2':  //旧密码错误
                    layer.msg('原密码错误！');
                    break;
                case '3':  //修改成功
                    layer.alert('密码修改成功！', {
                        icon: 6,
                        skin: 'layer-ext-moon'
                    },function(){
                        window.location.href = '/admin/login';
                    });
                    break;
                case '4':  //修改失败
                    layer.msg('密码修改失败！');
                    break;
            }

        })

   
    })
    
</script>
@endsection