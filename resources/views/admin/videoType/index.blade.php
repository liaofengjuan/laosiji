@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">视频分类</a></li>
        <li class="am-active">视频列表</li>
    </ol>
      <table class="am-table am-table-bordered am-table-hover">
        <tr style="background:#f9f9f9" >
          <th style="text-align:center">ID</th>
          <th style="text-align:center">类名</th>
          <th style="text-align:center">操作</th>
          <th style="text-align:center">详情</th>
        </tr>
        @foreach($data as $v)
        <tr class="bggray" >
            <td align="center" >{{$v['id']}}</td>
            <td align="center" >{{$v['title']}}</td>
            <td align="center"  >
              <a href="">修改</a>
              <span class="gray">&nbsp;|&nbsp;</span>
              <a href="#">添加子类</a>
             
              <span class="gray">&nbsp;|&nbsp;</span>
              <a href="#">删除</a>
            </td>
            <td align="center">
              <button type="button" class="am-btn am-btn-xs am-btn-success ">
                <span class=""></span> 查看子类
              </button>
            </td>
        </tr>
        @endforeach
        <tr class="zi" style="display:none">
            <td align="center" ></td>
            <td align="center" ></td>
            <td align="center"  >
              <a href="#">修改</a>
              <span class="gray">&nbsp;|&nbsp;</span>
              <a href="#">删除</a>
            </td>
            <td align="center">
             
            </td>
        </tr>
      </table>
</div>
<script type="text/javascript">

  var num = 0;
  
    $('button[type=button]').click(function(){
      if(num%2==0){
        num = num + 1;
        //获取主类的id
        var id = $(this).parent().parent().find("td").html();
        var mythis = $(this);
        //发送ajaxs
        $.get('/admin/videoType/'+id,function(data){
            if(data.length>0){
              for(var i=0;i<data.length;i++){
                $('.zi td:eq(0)').html(data[i].id);
                $('.zi td:eq(1)').html(data[i].title);
                $('.zi td:eq(3)').find('a').attr('href',"/admin/videoType/info/"+data[i].id);
                mythis.parent().parent().after($('.zi').clone().addClass('clone').css('display','table-row'));
              }
            }else{
              layer.tips('没有子类', mythis, {
                tips: [4, '#78BA32']
              });
            }

        },'json')
      }else{
        num = num + 1;
        $('.clone').remove();
      }
    })
  
  
</script>
@endsection