@extends('home.layout.center')
@section('right')
  <!--右侧部分-->
  <div class="right840">
    <div class="title6">
      <h1><a href="#" class="on">信息完善</a></h1>
      <h1><a href="#">修改图像</a></h1>
      <h1><a href="#">账户安全</a></h1>
    </div>
    <div class="display">
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
          <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>邮 箱:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <input type="text" class="input1" value="{{$data->userinfo->email}}"  name=""/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class="f_black">请输入数字</font></td>
        </tr>
        
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>性别:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <input type="radio" />
            男
            <input type="radio" />
            女</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<b>所在地:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <select class="input5">
              <option>选择省份</option>
            </select>
            &nbsp;
            <select class="input5">
              <option>选择市</option>
            </select>
            &nbsp;
            <select class="input5">
              <option>选择区/县</option>
            </select></td>
        </tr>
        <td>&nbsp;&nbsp;&nbsp;<b>出生日期:</b></td>
          <td>&nbsp;&nbsp;&nbsp;
            <select class="input5">
              <option>选择年份</option>
            </select>
            &nbsp;
            <select class="input5">
              <option>选择月份</option>
            </select>
            &nbsp;
            <select class="input5">
              <option>选择日期</option>
            </select></td>
        </tr>
        <tr>
          <td></td>
          <td colspan="2">&nbsp;&nbsp;&nbsp;
            <input type="submit" value="保存信息" class="btn1" />
            &nbsp;&nbsp;&nbsp;
            <input  type="reset" value="取消" class="btn4" /></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection