@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">系统配置</a></li>
    </ol>
    <div class="tpl-portlet-components" >
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-key"></span> 系统配置
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                
            </div>


        </div>
        <div class="tpl-block l-heigh">

            <div class="am-g tpl-amazeui-form">
    <div class="idTabs">
           
          <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal banner-upload"  enctype="multipart/form-data" action='/admin/config' method='post'>
                    {{csrf_field()}}
                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">网站名称</label>
                        <div class="am-u-sm-9">
                            <input type="text"name="webname" value="{{$res['webname']}}" id="webname" placeholder="请输入友情网站名称" >
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">网站关键字</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="keywords" id="keywords" value="{{$res['keywords']}}" placeholder="请输入关键字">
                        </div>
                        
                    </div>
                    <div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">网站描述</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="description" id="descriptio" value="{{$res['description']}}" placeholder="请输入网站描述">
                        </div>
                        
                    </div>
                    <div class="am-form-group">
                        <label for="copyright" class="am-u-sm-3 am-form-label">网站版权</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="copyright" id="copyright" value="{{$res['copyright']}}" placeholder="请输入网站版权">
                        </div>
                        
                    </div>
                    <div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">状态</label>
                        <div class="am-u-sm-9" style="font-size:15px">
                            <input type="radio" value="0" name="status" style="margin-left:10px" {{ $res['status']==0?'checked':'' }}>启用
                            <input type="radio" value="1" name="status" style="margin-left:100px" {{ $res['status']==1?'checked':'' }}>禁用
                        </div>
                    </div>
                     <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">logo图片</label>
                        <div class="am-u-sm-9">
                            <div class="img-wrap" style="width:100px;overflow:hidden;position:relative">
                                <img src="{{env('PATH_IMG').$res['logo']}}" onerror="javascript:this.src='/admins/img/upload_icon.jpg'" id="myimg" class="am-img-thumbnail">
                                <input type="file" value="" name="pic" id="pic" style="position:  absolute;top: 0;width:  100px;height:  83px;opacity:  0;" >
                                <input type="hidden" value="" name="logo" id="logo">
                            </div>
                        </div>
                        
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                           <input   class="am-btn am-btn-primary am-btn-block" type="submit" value="修改" />
                            <!-- <button type="button" class="am-btn am-btn-primary am-btn-block">修改</button> -->
                        </div>
                    </div>
                </form>
              </div>
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

    //判断数据是否为空
    $('input[type=submit]').click(function(){
        var webname = $('input[name=webname]').val();
        var keywords = $('input[name=keywords]').val();
        var description = $('input[name=description]').val();
        var copyright = $('input[name=copyright]').val();
        var status = $('input[name=status]').val();
        var logo = $('input[name=logo]').val();
        if(webname!='' && keywords!='' && description!='' && copyright!='' && status!='' && logo!='' ){
            return true;
        }
        alert('不能提交空数据');
        return false;

    })
</script>

    
@endsection