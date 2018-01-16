@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">轮播图管理</a></li>
        <li class="am-active">添加轮播图</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-plus"></span> 添加轮播图
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            <div class="portlet-input input-small input-inline">
                <div class="input-icon right">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="tpl-block">
      <div class="am-g">
          <div class="tpl-form-body tpl-form-line">
              <form class="am-form tpl-form-line-form banner-upload" enctype="multipart/form-data">
              {{csrf_field()}}
                  <div class="am-form-group">
                      <label for="title" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" class="tpl-form-input" id="title" name="title" value="" placeholder="请输入标题文字">
                          <small></small>
                      </div>
                  </div>

                  <div class="am-form-group">
                      <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label>
                      <div class="am-u-sm-9">
                          <div class="am-form-group am-form-file">
                              <div class="tpl-form-file-img">
                                  <img src="" id="myimg" alt="" onerror="javascript:this.src='http://p2duy5ziy.bkt.clouddn.com/61618d01846c8f83deda1a6ee8154566.jpg?imageView2/1/w/300/h/175/q/75|imageslim'">
                              </div>
                              <button type="button" class="am-btn am-btn-danger am-btn-sm">
                              <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                              <input id="doc-form-file" type="file" name='pic' value="">
                              <input type="hidden" name="picture" value="" >
                          </div>

                      </div>
                  </div>

                  <div class="am-form-group">
                      <div class="am-u-sm-9 am-u-sm-push-3">
                          <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                      </div>
                  </div>
              </form>

          </div>
      </div>
  </div>
    <div class="tpl-alert"></div>
</div>
<script type="text/javascript">
  $('input[type=file]').change(function(){
      upload_img();
  })

  function upload_img(){
    // 判断是否有选择上传文件
        var imgPath = $("input[type=file]").val();
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
                // var index = layer.load(1, {
                //               shade: [0.1,'#fff'] //0.1透明度的白色背景
                //             });
                // $('#myimg').attr('src','');
            },
            success: function(data) {
                alert(data.message);
                $('#myimg').attr('src',data.filePath);
                $('input[type=hidden]').val(data.fileName);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
  }

  //提交表单
  $('button[type=button]:eq(1)').click(function(){
      var title = $('input[name=title]').val();
      var pic = $('input[type=hidden]').val();
      if(!(title!='' && pic!='')){
        alert('不能提交空数据');
        return;
      }
      $.ajax({
          url:'/admin/slideshow',
          type:'POST',
          async: false,//同步
          data:{'title':title,'pic':pic,'_token':"{{csrf_token()}}"},
          success: function(data) {
              if(data=='0'){
                  alert('恭喜！添加成功');
                  window.location.href = "/admin/slideshow";
              }else{
                  alert("添加失败1");
                  return false;
              }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
          alert("添加失败2");
          return false;
      }

      })
  })
</script>
@endsection