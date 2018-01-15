@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">视频管理</a></li>
        <li class="am-active">视频列表</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-navicon"></span> 视频列表
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            <div class="portlet-input input-small input-inline">
                <div class="input-icon right">
                    <i class="am-icon-search"></i>
                    <input type="text" class="form-control form-control-solid" placeholder="搜索..."> 
                </div>
            </div>
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a class="am-btn am-btn-default am-btn-success" role="button" href="{{url('admin/user/create')}}" target="main"><span class="am-icon-plus"></span>发布视频</a>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}">
                      <option value="option1">所有类别</option>
                      <option value="option2">IT业界</option>
                      <option value="option3">数码产品</option>
                      <option value="option3">笔记本电脑</option>
                      <option value="option3">平板电脑</option>
                      <option value="option3">只能手机</option>
                      <option value="option3">超极本</option>
                    </select>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                    <span class="am-input-group-btn">
                    <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>
                  </span>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>视频名称</th>
                                <th>类型</th>
                                <th>vip</th>
                                <th>状态</th>
                                <th>点击量</th>
                                <th>发布时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arr as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td>{{$v['video_title']}}</td>
                                <td>{{$v['type']}}</td>
                                @if($v['vip']==1)
                                <td>是</td>
                                @else
                                <td>否</td>
                                @endif
                                @if($v['status']==0)
                                <td>开启</td>
                                @else
                                <td>关闭</td>
                                @endif
                                <td>{{$v['clicks']}}</td>
                                <td>{{date('Y-m-d H:i:s',$v['create_at'])}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="edit({{$v['id']}})" style="background:#fff"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                            <!-- <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button> -->
                                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del({{$v['id']}},$(this))" style="background:#fff"><span class="am-icon-trash-o"></span> 删除</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="am-cf">
                        
                        <div class="am-fr">
                        </div>
                    </div>

                    <hr>

                </form>
            </div>

        </div>
    </div>
    <div class="tpl-alert"></div>
</div>
<script type="text/javascript">
    //加载编辑页面
    function edit(id){
        window.location.href = "/admin/video/2/edit";
    }
    //执行删除
    function del(id,obj){
        $.post('/admin/video/'+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
            if(data=='0'){
                alert('恭喜，删除成功');
                obj.parent().parent().parent().parent().remove();
            }else{
                alert('抱歉，删除失败');
                return false;
            }
        })
    }
</script>
@endsection