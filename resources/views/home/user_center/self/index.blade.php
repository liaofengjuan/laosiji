@extends('home.layout.center')
@section('right')
  <!--右侧部分-->
  <div class="right840">
    <div class="title6">
      <h1><a href="#" class="on">信息完善</a></h1>
      <h1><a href="/center/self/shangchuan">修改头像</a></h1>
      <h1><a href="/center/self/psw">账户安全</a></h1>
    </div>
    <div class="display">
      <form id='formquan'>
      <table class="table-info" align="center" cellspacing="0" cellpadding="0" class="tab">
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>手机号:</b></td>
          <td style="display:block">&nbsp;&nbsp;&nbsp;{{$data->phone}} &nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>用户名:</b></td>
          <td>&nbsp;&nbsp;&nbsp;{{$data->username}} &nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>注册时间:</b></td>
          <td>&nbsp;&nbsp;&nbsp;{{$data->userinfo->created_at}} &nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>vip到期时间:</b></td>
          <td>&nbsp;&nbsp;&nbsp;@if(($data->userinfo->vip_time-time()) > 0){{date('Y-m-d H:i:s',$data->userinfo->vip_time)}} @else 已到期 @endif&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&4;&nbsp;&nbsp;<b>年 龄:{{$data->userinfo->vip_time-time()}}</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <input type="text" style="color:#666" class="input1 yxzz34" value="{{$data->userinfo->age}}"  name="age"/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class="f_black">请输入年龄</font></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>邮 箱:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <input type="text" style="color:#666" class="input1 yxzz33" value="{{$data->userinfo->email}}"  name="email"/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="" class="f_black">请输入邮箱</font></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>性别:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <input type="radio" name="sex" value="m" @if($data->userinfo->sex == 'm') checked @endif />
            男
            <input type="radio" name="sex" value="w"  @if($data->userinfo->sex == 'w') checked @endif />
            女</td>
        </tr>
        
        <tr>
          <td></td>
          <td colspan="2">&nbsp;&nbsp;&nbsp;
            <input type="button" value="保存信息" class="btn1 bbbtn1" />
            &nbsp;&nbsp;&nbsp;
            <input  type="reset" value="重置信息" class="btn4" /></td>
        </tr>
      </table>
      </form>

<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

<script type="text/javascript">
  var jq3 = $.noConflict(true);
  //验证结果
  var ok1 = false;
  var ok2 = false;

  //正则验证邮箱
  jq3('.yxzz33').blur(function(){
      var email_preg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      //验证是否为空
      if(!jq3(this).val())
      {
        // jq3('.f_black').eq(1).html("邮箱不能为空！");
        // jq3('.f_black').eq(1).css('color','red');
        ok1 = true;
        return;
      }
      //验证邮箱格式
      if(!email_preg.test(jq3(this).val()))
      {
        jq3('.f_black').eq(1).html("邮箱格式不正确！");
        jq3('.f_black').eq(1).css('color','red');
        ok1 = false;
        return;
      }
      jq3('.f_black').eq(1).html("牛逼！");
      jq3('.f_black').eq(1).css('color','yellowgreen');
      ok1 = true;
  });

  //验证年龄
  jq3('.yxzz34').blur(function(){
    var age_preg = /^\d{1,3}$/;
    //验证是否为空
    if(!jq3(this).val())
    {
      // jq3('.f_black').eq(0).html("年龄不能为空！");
      // jq3('.f_black').eq(0).css('color','red');
      ok2 = true;
      return;
    }
    //验证年龄
    if(!age_preg.test(jq3(this).val()))
    {
      jq3('.f_black').eq(0).html("请输入正确年龄！");
      jq3('.f_black').eq(0).css('color','red');
      ok2 = false;
      return;
    }

    jq3('.f_black').eq(0).html("牛逼！");
    jq3('.f_black').eq(0).css('color','yellowgreen');
    ok2 = true;
  });

  //执行修改
  jq3('.bbbtn1').click(function(){
    jq3('.yxzz34,.yxzz33').trigger('blur');
    if(ok1 && ok2)
    {
      var formData = new FormData(jq3('#formquan')[0]);
      jq3.ajax({
        type: "POST",
            headers: {
            'X-CSRF-TOKEN': jq3('meta[name="csrf-token"]').attr('content')
        },
            url: "/center/self/updateinfo",
            data: formData,
            // dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            // async: true,//异步
            success: function(data) {
                // layer.close();
                // alert(data.message);
                // jq1('#myimg').attr('src',data.filePath);
                // jq1('#logo').val(data.fileName);

                // if(data.message == '2')
                // {
                //   insert_img(data.filePath);
                // }else{
                //   layer.alert('上传失败！', {
                //       icon: 2,
                //       skin: 'layer-ext-moon' 
                //     })
                // }
                console.log(data);
                switch(data)
                {
                  case '2': //成功
                    layer.alert('修改成功！', {
                      icon: 1,
                      skin: 'layer-ext-moon' 
                    })
                    break;
                  case '3':
                    layer.alert('修改失败！', {
                      icon: 2,
                      skin: 'layer-ext-moon' 
                    })
                    break;
                }
            }
        });
    }else{
      layer.msg('请正确填写信息！');
      return false;
    }
  });
</script>

    </div>
  </div>
</div>
@endsection