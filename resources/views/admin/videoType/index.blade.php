@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components l-height" >
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
          <th style="text-align:center">状态</th>
          <th style="text-align:center">操作</th>
          <th style="text-align:center">详情</th>
        </tr>
        @foreach($data as $v)
        <tr class="bggray" >
            <td align="center" >{{$v['id']}}</td>
            <td align="center" >{{$v['title']}}</td>
            @if($v['status']==0)
            <td align="center" >开启</td>
            @else
            <td align="center" >关闭</td>
            @endif
            <td align="center"  >
              <a href="{{url('/admin/videoType/'.$v['id'].'/edit')}}">修改</a>
              <span class="gray">&nbsp;|&nbsp;</span>
              <a href="{{url('/admin/videoType/addSon/'.$v['id'])}}">添加子类</a>
             
              <span class="gray">&nbsp;|&nbsp;</span>
              <a onclick="del($(this))">删除</a>
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
            <td align="center" ></td>
            <td align="center"  >
              <a href="">修改</a>
              <span class="gray">&nbsp;|&nbsp;</span>
              <a  onclick="del($(this))">删除</a>
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
            // console.log(data);
            if(data.length>0){
              for(var i=0;i<data.length;i++){
                if(data[i].status=='0'){
                  mythis.parent().parent().after("<tr class='zi clone'><td align='center' >"+data[i].id+"</td><td align='center' >"+data[i].title+"</td><td align='center' >开启</td><td align='center'  ><a href='/admin/videoType/'"+data[i].id+"'/edit'>修改</a><span class='gray'>&nbsp;|&nbsp;</span><a  onclick='del($(this))'>删除</a></td><td align='center'></td></tr>");
                }else{
                  mythis.parent().parent().after("<tr class='zi clone'><td align='center' >"+data[i].id+"</td><td align='center' >"+data[i].title+"</td><td align='center' >关闭</td><td align='center'  ><a href='/admin/videoType/'"+data[i].id+"'/edit'>修改</a><span class='gray'>&nbsp;|&nbsp;</span><a  onclick='del($(this))'>删除</a></td><td align='center'></td></tr>");
                }
                
                
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
    //执行删除
    function del(obj){
        //判断是否有子类，没有才可以删除
        layer.confirm('确定要删除吗？', {
          btn: ['确定','取消'] //按钮
        },function(){
          
          var id = obj.parent().parent().find('td:eq(0)').html();

          $.post("/admin/videoType/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
              switch(data){
                  case '0':
                      layer.msg('恭喜删除成功', {icon: 1});
                      obj.parent().parent().remove();
                    break;
                  case '1':
                      layer.msg('子类不为空，不能删除', {icon: 5});
                      return false;
                      break;
                  case '2':
                      layer.msg('删除失败', {icon: 5});
                      return false;
                      break;
                  default:
                      layer.msg('删除失败', {icon: 5});
                      break;
              }
          })
        })
        
    }
</script>
@endsection