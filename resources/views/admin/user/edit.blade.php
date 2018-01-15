@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="am-active">修改用户</li>
    </ol>
<div class="tpl-portlet-components" style="height:500px">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-paint-brush"></span> 修改用户
        </div>
    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group" style="margin-top:50px">
                        <label for="username" class="am-u-sm-3 am-form-label">用户名</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="username" value="{{$data['username']}}" id="username" disabled >
                        </div>
                    </div>
                    <div class="am-form-group" style="margin-top:50px">
                        <span class="am-u-sm-3 am-form-label">用户状态</span>
                        <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="0" name="status" {{$status==0?'checked':''}}> 正常</label>
                        <label class="am-radio-inline" style="margin-left:150px"><input type="radio" value="1" name="status" {{$status==1?'checked':''}}> 禁言</label>
                    </div>
                    <div class="am-form-group" style="margin-top:50px">
                        <span class="am-u-sm-3 am-form-label">vip自动续费</span>
                        <label class="am-radio-inline" style="margin-left:30px"><input type="radio" value="1" name="vip" > 一个月</label>
                        <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="3" name="vip"> 三个月</label>
                        <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="6" name="vip"> 六个月</label>
                        <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="12" name="vip"> 一年</label>
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

    $('button[type=button]').click(function(){
        var status = $('input[name=status]:checked').val();
        var vip = $('input[name=vip]:checked').val();
        var id = {{$id}};
        $.post('{{"/admin/user/".$id}}',{'vip':vip,'status':status,'_method':'put','_token':'{{csrf_token()}}'},function(data){
            if(data==0){
                alert('恭喜修改成功');
                window.location.href = '/admin/user';
            }else{
                alert('抱歉，修改失败');
                return;
            }
        })
    })
    
</script>
@endsection