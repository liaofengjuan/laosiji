@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">友情链接管理</a></li>
        <li class="am-active">修改友情链接</li>
    </ol>
    <div class="tpl-portlet-components" >
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-plus"></span> 修改友情链接
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                
            </div>


        </div>
        <div class="tpl-block ">

            <div class="am-g tpl-amazeui-form">


                <div class="am-u-sm-12 am-u-md-9">
                    <form id='fo' class="am-form am-form-horizontal banner-upload"  enctype="multipart/form-data">
                        {{csrf_field()}}                       
                        {{method_field('put')}}
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">链接名称</label>
                            <div class="am-u-sm-9">
                                <input type="text"name="title" value="{{$data['title']}}" id="title">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="path" class="am-u-sm-3 am-form-label">链接地址</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="path" id="path" value="{{$data['path']}}">
                            </div>
                            
                        </div>
                        <div class="am-form-group">
                            <label for="statusstatus" class="am-u-sm-3 am-form-label">状态</label>
                            <div class="am-u-sm-9" style="font-size:15px">
                                <input type="radio" value="0" name="status" style="margin-left:10px" checked>启用
                                <input type="radio" value="1" name="status" style="margin-left:100px">禁用
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
   
// alert($) ;
    $('button[type=button]').click(function(){
        var title = $('input[name=title]').val();
        var path = $('input[name=path]').val();
        var status = $('input[name=status]').val();
        var id = {{$data['id']}};
        //判断是否为空
        if(!(title!='' && path!='' && status!='')){
            alert('不能提交空数据');
            return false;
        }
        /*$.post('{{url("/admin/friend/")}}' + '/' + id,{'title':title,'path':path,'status':status,'_method':'put','_token':'{{csrf_token()}}'},function(data){
            if(data==0){
                alert('恭喜修改成功');
                window.location.href = '/admin/friend';
            }else{
                alert('抱歉，修改失败');
            }
        })*/
    var formData = new FormData($('#fo')[0]) ;
        $.ajax({
            url:'/admin/friend/' + id ,
            type:'post' ,
            data:formData ,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data) {
                if(data==0){
                    alert('恭喜修改成功');
                    window.location.href = '/admin/friend';
                }else{
                    alert('抱歉，修改失败');
                    return;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('抱歉，修改失败');
                return;
            }
        }) ;
    })
</script>


@endsection