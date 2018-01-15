@extends('layout.admin')

@section('content')
<div class="tpl-content-wrapper" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">视频管理</a></li>
        <li class="am-active">添加视频</li>
    </ol>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-plus"></span> 添加视频
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            
        </div>


    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                
                
                <form class="am-form am-form-horizontal" id="myform" enctype="multipart/form-data" >
                {{csrf_field()}}
                    <div class="am-form-group" style="font-size:14px">
                        <label for="vip" class="am-u-sm-3 am-form-label">类别</label>
                        <span style="margin-left:20px">父类 </span><span style="color:red;"> * </span> 
                        <select name="fu" id="fu" style="display:inline;width:100px;font-size:14px;">
                            <option value="">--请选择--</option>
                            @foreach($data as $v)
                            <option value="{{$v['id']}}">{{$v['title']}}</option>
                            @endforeach
                        </select>
                        <span style="margin-left:20px">子类 </span><span style="color:red"> * </span>
                        <select name="zi" id="zi" style="display:inline;width:100px;font-size:14px">
                            <option value="">--请选择--</option>
                        </select>
                    </div>
                    <script type="text/javascript">
                        $('#fu').change(function(){
                            var pid = $(this).val();//获取父id
                            var str = '<option value="">--请选择--</option>';
                            //当选择了父类，发送ajax查询子类
                            $.post('/admin/video/searchSon/'+pid,{'_token':'{{csrf_token()}}'},function(data){
                                data = eval("("+data+")");//转换为json对象

                                for(var i=0;i<data.length;i++){
                                    str += '<option value='+data[i].id+'>'+data[i].title+'</option>';
                                }
                                $('#zi').html(str);
                            });
                        })
                    </script>
                    <div class="am-form-group">
                        <label for="video_title" class="am-u-sm-3 am-form-label">视频标题</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="video_title" id="video_title" >
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="vip" class="am-u-sm-3 am-form-label">是否为vip</label>
                        <div class="am-u-sm-9">
                            <input type="radio" name="vip" value="1"  > 是 
                            <input type="radio" name="vip" value="0" style="margin-left:50px"> 否 
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="status" class="am-u-sm-3 am-form-label">状态</label>
                        <div class="am-u-sm-9">
                            <input type="radio" name="status" value="0" > 开启 
                            <input type="radio" name="status" value="1" style="margin-left:50px"> 禁用 
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="pic" class="am-u-sm-3 am-form-label">缩略图</label>
                        <div class="am-u-sm-9">
                            <input type="file" value="" name="pic" id="pic" style="display:inline">
                           <!--  <input type="hidden" value="" name="pic" id="pic" style="display:inline"> -->
                            <!-- <span class="tpl-label-info" onclick="pic_upload($(this))">点击上传图片</span> -->
                            
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="play" class="am-u-sm-3 am-form-label">视频文件</label>
                        <div class="am-u-sm-9">
                            <input type="file" value="" name="play" id="play" style="display:inline">
                            <!-- <input type="hidden" value="" name="play" id="play" style="display:inline"> -->
                            <!-- <span class="tpl-label-info" onclick="file_upload($(this))">点击上传视频文件</span> -->
                            
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="size" class="am-u-sm-3 am-form-label">时长</label>
                        <div class="am-u-sm-9">
                            <input type="text" value="" name="size" id="size" >
                            <small class='little'>格式————   00：00：00</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="director" class="am-u-sm-3 am-form-label">导演</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="director" id="director" >
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="main" class="am-u-sm-3 am-form-label">主演</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="main" id="main" >
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="info" class="am-u-sm-3 am-form-label">简介</label>
                        <div class="am-u-sm-9">
                            <textarea name="info" placeholder="请输入简介"></textarea>
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
    //判断是否为空
    $('button[type=button]').click(function(){
        var zi = $("select[name='zi']").val();
        var video_title = $('input[name="video_title"]').val();
        var vip = $('input[name="vip"]').val();
        var stauts = $('input[name="stauts"]').val();
        var pic = $('input[name="pic"]').val();
        var play = $('input[name="play"]').val();
        var size = $('input[name="size"]').val();
        var info = $('input[name="info"]').val();
        //判断是否为空
        if(!(zi!='' && video_title!='' && vip!='' && stauts!='' && pic!='' && play!='' && size!='' && info!='')){
            alert('不能提交空数据');
            return;
        }

        var preg_size = /^\d+:[0-5]\d:[0-5]\d$/;
        if(!preg_size.test(size)){
            alert('电影时长格式不对');
            return;
        }
        
        //判断上传图片的后缀名
        var picExtension = pic.substr(pic.lastIndexOf('.') + 1);
        if (picExtension != 'jpg' && picExtension != 'gif'
            && picExtension != 'png' && picExtension != 'bmp'
            && picExtension != 'jpeg') {
            alert("图片格式不正确，请重新选择");
            return;
        }
        //判断上传文件的后缀名
        var playExtension = play.substr(play.lastIndexOf('.') + 1);
        if (playExtension != 'mkv' && playExtension != 'srt'
            && playExtension != 'rmvb' && playExtension != 'wmv'
            && playExtension != 'avi' && playExtension != 'MOV' && playExtension != 'mp4') {
            alert("视频格式不正确，请重新选择");
            return;
        }
        var formData = new FormData($('#myform')[0]);
        $.ajax({
            url:'/admin/video',
            type:'POST',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            async: false,//同步
            beforeSend:function(XMLHttpRequest){
                
            },
            success: function(data) {
                if(data=='0'){
                    alert('恭喜！添加成功');
                    window.location.href = "/admin/video";
                }else{
                    alert('抱歉！添加失败');
                    return;
                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("添加失败，请检查网络后重试");
                return;
            }

        })
        
    })
    

</script>
@endsection