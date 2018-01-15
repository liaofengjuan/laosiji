@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">轮播图管理</a></li>
        <li class="am-active">修改轮播图</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-pen"></span> 轮播图修改
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
              <form class="am-form tpl-form-line-form banner-upload" >
              {{csrf_field()}}
                  <div class="am-form-group">
                      <label for="title" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" class="tpl-form-input" id="title" name="title" value="{{$res['title']}}" disabled>
                          <small></small>
                      </div>
                  </div>
                  <div class="am-form-group" style="font-size:14px">
                      <label for="status" class="am-u-sm-3 am-form-label">状态</label>
                      <div class="am-u-sm-9">
                          <input type="radio" name="status" value="0"  {{$res['status']==0?'checked':''}}> 开启 
                          <input type="radio" name="status" value="1" style="margin-left:50px" {{$res['stauts']==1?'checked':''}}> 关闭 
                      </div>
                  </div>
                  

                  <div class="am-form-group">
                      <div class="am-u-sm-9 am-u-sm-push-3">
                          <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                      </div>
                  </div>
              </form>

          </div>
      </div>
  </div>
    <div class="tpl-alert"></div>
</div>
<script type="text/javascript">

    $('button[type=button]').click(function(){
        var status = $('input:checked').val();
        $.post("{{url('/admin/slideshow/'.$res['id'])}}",{'status':status,'_method':'put','_token':'{{csrf_token()}}'},function(data){
            if(data==0){
                alert('恭喜修改成功');
                window.location.href = '/admin/slideshow';
            }else{
                alert('抱歉，修改失败');
                return;
            }
        })
    })
    
</script>
@endsection