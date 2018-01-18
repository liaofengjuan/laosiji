@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="am-active">修改广告</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-pen"></span> 广告修改
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
              <form id='ff' class="am-form tpl-form-line-form banner-upload" >
              {{csrf_field()}}
              {{method_field('put')}}
                  <div class="am-form-group">
                      <label for="title" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" class="tpl-form-input" id="title" name="title" value="{{$data['title']}}" disabled="disabled">
                          <small></small>
                      </div>
                  </div>
                  <div class="am-form-group">
                      <label for="address" class="am-u-sm-3 am-form-label">链接地址 <span class="tpl-form-line-small-title">Url</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" class="tpl-form-input" id="address" name="address" value="{{$data['address']}}"  disabled="disabled">
                          <small></small>
                      </div>
                  </div>
                  <div class="am-form-group" style="font-size:14px">
                      <label for="status" class="am-u-sm-3 am-form-label">状态</label>
                      <div class="am-u-sm-9">
                          <input type="radio" name="status" value="0"  {{$data['status']==0?'checked':''}}> 开启 
                          <input type="radio" name="status" value="1" style="margin-left:50px" {{$data['status']==1?'checked':''}}> 关闭 
                      </div>
                  </div>

                  <div class="am-form-group">
                      <span class="am-u-sm-3 am-form-label">广告期限</span>
                      <label class="am-radio-inline" style="margin-left:30px"><input type="radio" value="1" name="deadline" > 一个月</label>
                      <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="3" name="deadline"> 三个月</label>
                      <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="6" name="deadline"> 六个月</label>
                      <label class="am-radio-inline" style="margin-left:50px"><input type="radio" value="12" name="deadline"> 一年</label>
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
        var title = $('input[name=title]').val();
        var address = $('input[name=address]').val();
        var status = $('input[name=status]:checked').val();
        var deadline = $('input[name=deadline]:checked').val();
        // var id = {{$data['id']}};
        // console.log(title);
        // console.log(address);
        // console.log(status);
        // console.log(deadline);
        // console.log(id);

        $.post("{{url('/admin/advertise/'.$data['id'])}}",{'title':title,'address':address,'status':status,'deadline':deadline,'_method':'put','_token':'{{csrf_token()}}'},function(data){
            if(data=='0'){
                alert('恭喜修改成功');
                window.location.href = '/admin/advertise';
            }else{
                alert('抱歉，修改失败');
            }
           
        })
    })
</script>
@endsection