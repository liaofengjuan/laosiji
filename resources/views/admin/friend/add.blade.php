@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">友情链接管理</a></li>
        <li class="am-active">新增友情链接</li>
    </ol>
    <div class="tpl-portlet-components" >
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-plus"></span> 新增友情链接
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                
            </div>


        </div>
        <div class="tpl-block ">

            <div class="am-g tpl-amazeui-form">


                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal banner-upload"  enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">链接名称</label>
                            <div class="am-u-sm-9">
                                <input type="text"name="title" value="" id="title" placeholder="请输入友情链接名称" >
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="path" class="am-u-sm-3 am-form-label">链接地址</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="path" id="path" value="" placeholder="请输入链接地址">
                            </div>
                            
                        </div>
                        <div class="am-form-group">
                            <label for="statusstatus" class="am-u-sm-3 am-form-label">状态</label>
                            <div class="am-u-sm-9" style="font-size:15px">
                                <input type="radio" value="0" name="status" style="margin-left:10px" checked>启用
                                <input type="radio" value="1" name="status" style="margin-left:100px">禁用
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">logo图片</label>
                            <div class="am-u-sm-9">
                                <div class="img-wrap" style="width:100px;overflow:hidden;position:relative">
                                    <img src="" onerror="javascript:this.src='/admins/img/upload_icon.jpg'" id="myimg" class="am-img-thumbnail">
                                    <input type="file" value="" name="pic" id="pic" style="position:  absolute;top: 0;width:  100px;height:  83px;opacity:  0;" >
                                    <input type="hidden" value="" name="logo" id="logo">

                                </div>
                            </div>
                            
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary" >添加友情链接</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
   
    $('#pic').change(function(){
        add();
    })
    
    function add(){
        
        // 判断是否有选择上传文件
        var imgPath = $("#pic").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp'
            && strExtension != 'jpeg') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData($('.banner-upload')[0]);
        $.ajax({
            // header:{'Content-type':'image/jpeg'},
            type: "POST",
            url: "/admin/friend/uploadImg",
            data: formData,
            dataType:'json',
            // async: true,//异步
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(XMLHttpRequest){
                $('#myimg').attr('src','/admins/img/run.gif');
            },
            success: function(data) {
                // layer.close();
                alert(data.message);
                $('#myimg').attr('src',data.filePath);
                $('#logo').val(data.fileName);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

    $('button[type=submit]').click(function(){
        //获取form表单的值
        var title = $('input[name=title]').val();
        var path = $('input[name=path]').val();
        var logo = $('input[name=logo]').val();
        var status = $('input[name=status]:checked').val();
        //判断是否提交了空数据
        if(title.length!=0 && path.length!=0 && logo.length!=0){
            $.ajax({
                url:'/admin/friend',
                type:'POST',
                async: false,//同步
                data:{'title':title,'path':path,'logo':logo,'status':status,'_token':"{{csrf_token()}}"},
                success: function(data) {
                    if(data=='0'){
                        alert('恭喜！添加成功');
                        window.location.href = "/admin/friend";
                    }else{
                        alert("添加失败1");
                        return false;
                    }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("添加失败2");
                return false;
            }

            })
        }else{

            alert('不能提交空数据');
            return false;
        }
       
    })
    
</script>


@endsection