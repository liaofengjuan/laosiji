@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">轮播图管理</a></li>
        <li class="am-active">轮播图列表</li>
    </ol>
    <div class="portlet-title ">
        <div class="caption font-green bold">
            <span class="am-icon-navicon"></span> 轮播图列表
        </div>
        
    </div>
    <div class="tpl-block l-height">
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a class="am-btn am-btn-default am-btn-success" role="button" href="{{url('admin/slideshow/create')}}" target="main"><span class="am-icon-plus"></span>新增轮播图</a>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main" >
                       <thead>
                              <tr>
                                  <th>编号</th>
                                  <th>电影名称</th>
                                  <th>缩略图</th>
                                  <th>状态</th>
                                  <th>创建时间</th>
                                  <th>操作</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $v)
                            <tr class="gradeX">
                                <td>{{$v['id']}}</td>
                                <td>{{$v['title']}}</td>
                                <td>
                                    <div class="img-wrap" style="width:100px;overflow:hidden;position:relative">
                                        <img src="{{env('PATH_IMG').$v['pic']}}?imageView2/1/w/100/h/40/q/75|imageslim"  class="am-img-thumbnail">
                                    </div>
                                </td>
                                @if($v['status']==0)
                                <td align="center">开启</td>
                                @else
                                <td align="center">关闭</td>
                                @endif
                                <td>{{date('Y-m-d H:i:s',$v['created_at'])}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="{{url('/admin/slideshow/'.$v['id'].'/edit')}}" style="background:#fff"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"  onclick="del({{$v['id']}},$(this))" style="background:#fff"><span class="am-icon-trash-o"></span> 删除</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            @endforeach
                          </tbody>               
                    </table>

                    <hr>

                </form>
            </div>

        </div>
    </div>
    <div class="tpl-alert"></div>
</div>
<script type="text/javascript">
    function del(id,obj){
        layer.confirm('确定要删除吗？', {
          btn: ['确定','取消'] //按钮
        },function(){
            $.post("/admin/slideshow/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                if(data=='0'){
                    layer.msg('恭喜删除成功', {icon: 1});
                    obj.parent().parent().parent().parent().remove();
                }else{
                    layer.msg('抱歉删除失败', {icon: 5});
                }
                
            })
        })
        
    }
</script>
    
@endsection