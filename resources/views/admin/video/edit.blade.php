@extends('layout.admin')

@section('content')
<div class="tpl-content-wrapper" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">视频管理</a></li>
        <li class="am-active">修改视频</li>
    </ol>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-plus"></span> 修改视频
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
                            <!-- <option value="">--请选择--</option> -->
                            @foreach($data as $v)
                            @if($v['id']==$fid)
                            <option value="{{$v['id']}}" selected>{{$v['title']}}</option>
                            @else
                            <option value="{{$v['id']}}">{{$v['title']}}</option>
                            @endif
                            @endforeach
                        </select>
                        <span style="margin-left:20px">子类 </span><span style="color:red"> * </span>
                        <select name="zi" id="zi" style="display:inline;width:100px;font-size:14px">
                            <option value="{{$stype['id']}}">{{$stype['title']}}</option>
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
                            <input type="text" name="video_title" value="{{$res['video_title']}}" id="video_title" >
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="vip" class="am-u-sm-3 am-form-label">是否为vip</label>
                        <div class="am-u-sm-9">
                            <input type="radio" name="vip" value="1"  {{$res['vip']==1?'checked':''}}> 是 
                            <input type="radio" name="vip" value="0" style="margin-left:50px" {{$res['vip']==0?'checked':''}}> 否 
                        </div>
                    </div>
                    <div class="am-form-group" style="font-size:14px">
                        <label for="status" class="am-u-sm-3 am-form-label">状态</label>
                        <div class="am-u-sm-9">
                            <input type="radio" name="status" value="0" {{$res['status']==0?'checked':''}}> 开启 
                            <input type="radio" name="status" value="1" {{$res['status']==1?'checked':''}} style="margin-left:50px"> 禁用 
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="info" class="am-u-sm-3 am-form-label">简介</label>
                        <div class="am-u-sm-9">
                            <textarea name="info" >{{$res['info']}}</textarea>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-primary">修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<script type="text/javascript">
    $('button[type="button"]').click(function(){
        var sid = $('#zi').val();
        var video_title = $('input[name=video_title]').val();
        var vip = $('input[name=vip]').val();
        var status = $('input[name=status]').val();
        var info = $('input[name=info]').val();
        //判断是否为空
        if(!(sid!='' && video_title!='' && vip!='' && status!='' && info!='')){
            alert('不能提交空数据');
            return false;
        }
        //发送ajax
        $.post("/admin/video/{{$res['id']}}",{'_token':"{{csrf_token()}}",'_method':'put','tid':sid,'video_title':video_title,'vip':vip,'status':status,'info':info},function(data){
            if(data=='0'){
                alert('恭喜，修改成功');
                window.location.href = '/admin/video';
            }else{
                alert('抱歉，修改失败');
                return false;
            }
        })
    })
</script>
@endsection