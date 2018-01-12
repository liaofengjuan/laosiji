@extends('layout.admin')

@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">分类管理</a></li>
        <li class="am-active">添加父类</li>
    </ol>
<div class="tpl-portlet-components l-height" >
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-plus"></span> 添加父类
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            
        </div>


    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" >
                    <div class="am-form-group">
                        <label for="title" class="am-u-sm-3 am-form-label">父类名</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="title" value="" id="title" placeholder="请输入类名" >
                            <small class='little'></small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="statusstatus" class="am-u-sm-3 am-form-label">状态</label>
                        <div class="am-u-sm-9" style="font-size:15px">
                            <input type="radio" value="0" name="status" style="margin-left:10px" checked>启用
                            <input type="radio" value="1" name="status" style="margin-left:100px" >禁用
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-primary">添加</button>
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
        var title = $('input[name=title]').val();
        var status = $('input[name=status]').val();
        //判断不能为空
       if(title.length==0){
            alert('不能提交空数据');
            return false;
       }
       //发送ajax
       $.ajax({
            type:'POST',
            url:"{{url('/admin/videoType')}}",
            data:{'title':title,'status':status,'_token':"{{csrf_token()}}"},
            success:function(data){
                if(data=='0'){
                    layer.msg('恭喜，添加成功', {icon: 1});
                    window.location.href = '/admin/videoType';
                }else{
                    layer.msg('添加失败，请重试', {icon: 5});
                    return false;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                layer.msg('添加失败，请重试', {icon: 5});
                return false;
            }
       })
    })
</script>
@endsection