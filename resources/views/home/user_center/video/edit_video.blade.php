@extends('home.layout.center')
@section('right')
  <div class="right840">
    <div class="title7">
      <h1>上传视频</h1>
    </div>
    <div class="display">
      <!-- <div class="title12"><img src="/homes/images/grzx/scimg2.jpg" /></div>
      <div class="wsxx">视频上传中，先完善信息吧！</div>
      <div class="jingdu"><span class="spjd"><img src="/homes/images/grzx/jdt.jpg" /></span><span class="qxsc"><a href="#">取消上传</a></span></div> -->
      <div class="videoinfo">
        <div class="title13">
          <h1>视频信息</h1>
        </div>
        <div class="left502">
        	<form id="myform" enctype="multipart/form-data" >
        	{{csrf_field()}}
          <table cellpadding="0" cellspacing="0" class="tab" height="580">
            <tr>
              <td><font class="f_red">*</font>&nbsp;&nbsp;&nbsp;<b>标题:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
                <input name="video_title" type="text" value="{{$vinfo->video_title}}" class="input4" style=" width:425px; height:25px;" /></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>导演:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
                <input name="director" type="text" value="{{$vinfo->director}}" class="input4" style=" width:425px; height:25px;" /></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>主演:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
                <input name="main" type="text" value="{{$vinfo->main}}" class="input4" style=" width:425px; height:25px;" /></td>
            </tr>

            <tr>
              <td><font class="f_red">*</font>&nbsp;&nbsp;&nbsp;<b>时长:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
                <input value="{{$vinfo->size}}" placeholder="格式————   00：00：00" name="size" type="text" class="input4" style=" width:425px; height:25px;" /></td>
            </tr>

            <tr>
              <td><font class="f_red">*</font>&nbsp;&nbsp;&nbsp;<b>状态:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
              	<input type="radio" name="status" value="0" @if($vinfo->status == '0') checked @endif> 开启 
            	<input type="radio" name="status" value="1" @if($vinfo->status == '1') checked @endif style="margin-left:50px"> 禁用 
            </tr>
            <tr>
              <td><font class="f_red">*</font>&nbsp;&nbsp;&nbsp;<b>简介:</b></td>
              <td>&nbsp;&nbsp;&nbsp;
                <textarea name="info" class="input4" style="width:425px; height:119px;">{{$vinfo->info}}</textarea></td>
            </tr>
            <tr>
              <td><font class="f_red">*</font>&nbsp;&nbsp;&nbsp;<b>分类:</b></td>
              <td><table class="tab1" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;&nbsp;&nbsp;
                      <select name="fu" id="fu" class="input7">
                         	<option value="8888888888">--请选择--</option>
                            @foreach($data as $v)
                            <option value="{{$v['id']}}" @if($v['id'] == $erji->pid) selected @endif>{{$v['title']}}</option>
                            @endforeach
                      </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <select name="zi" id="zi" class="input7">
                        <option>--请选择--</option>
                      </select>
                  </tr>
                </table></td>

<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

 <script type="text/javascript">
 	var jq5 = $.noConflict(true);
  var pid1 = jq5('#fu').val();
  jq5.post('/center/video/getSon/'+pid1,{'_token':'{{csrf_token()}}'},function(data){
            // data = eval("("+data+")");//转换为json对象

            var str1 = '<option value="">--请选择--</option>';
            for(var i=0;i<data.length;i++){
              if(data[i].id == {{$vinfo->tid}}){
                str1 += '<option selected value='+data[i].id+'>'+data[i].title+'</option>';
              }else{
                str1 += '<option value='+data[i].id+'>'+data[i].title+'</option>';
              }
            }
            jq5('#zi').html(str1);
        },'json');

 	jq5('#fu').change(function(){
        //获取父id
        var pid = jq5(this).val();
        var str = '<option value="">--请选择--</option>';
        //当选择了父类，发送ajax查询子类
        jq5.post('/center/video/getSon/'+pid,{'_token':'{{csrf_token()}}'},function(data){
            // data = eval("("+data+")");//转换为json对象
            for(var i=0;i<data.length;i++){
                str += '<option value='+data[i].id+'>'+data[i].title+'</option>';
            }
            jq5('#zi').html(str);
        },'json');
    })
 </script>


            </tr>
            
            <tr>
              <td></td>
              <td><input type="button" value="保存视频信息" class="input8" /></td>
            </tr>
          </table>
        </div></form>
        <div class="right245">
          
          
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    //判断是否为空
    jq5('input[type="button"]').click(function(){
        var zi = jq5("select[name='zi']").val();
        var video_title = jq5('input[name="video_title"]').val();
        var status = jq5('input:checked').val();
        var size = jq5('input[name="size"]').val();
        var info = jq5('input[name="info"]').val();
        //判断是否为空
        if(!(zi!='' && video_title!='' && size!='' && info!='')){
            alert('不能提交空数据');
            return;
        }

        var preg_size = /^\d+:[0-5]\d:[0-5]\d$/;
        if(!preg_size.test(size)){
            alert('电影时长格式不对');
            return;
        }
        
        
        var formData = new FormData(jq5('#myform')[0]);
        formData.append("_method",'put');
        
        jq5.ajax({
            url:'/center/video/{{$vinfo->id}}',
            type:'POST',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            async: false,//同步
            beforeSend:function(XMLHttpRequest){
                
            },
            success: function(msg) {
                if(msg=='2'){
                    alert('恭喜！修改成功');
                    // window.location.href = "/admin/video";
                }else if(msg=='3'){
                    alert('抱歉！修改失败');
                    return;
                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("修改失败，请检查网络后重试");
                return;
            }

        })
        
    })
</script> 
@endsection