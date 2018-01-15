@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" style="min-height:100vh">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="am-active">用户列表</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-navicon"></span> 用户列表
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
                        <a class="am-btn am-btn-default am-btn-success" role="button" href="{{url('admin/user/create')}}" target="main"><span class="am-icon-plus"></span>新增管理员</a>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}" class="doSearch">
                      <option value="0">搜索条件</option>
                      <option value="1">用户名</option>
                      <option value="2">手机号</option>
                      <option value="3">是否为vip(是|否)</option>
                    </select>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                    <span class="am-input-group-btn">
                    <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button" onclick="doSearch($(this))"></button>
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
                                <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>手机</th>
                                <th>邮箱</th>
                                <th>权限</th>
                                <th>状态</th>
                                <th>vip剩余时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $v)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{$v['id']}}</td>
                                <td>{{$v->username}}</td>
                                <td>{{$v->phone}}</td>
                                <td>{{$v->userinfo->email}}</td>
                                @if(($v->userinfo->authority)==0)
                                <td>普通</td>
                                @elseif(($v->userinfo->authority)==1)
                                <td>vip</td>
                                @endif
                                @if(($v->userinfo->status)==0)
                                <td>正常</td>
                                @else
                                <td>禁言</td>
                                @endif
                                <td>@if($v->userinfo->vip_time-time()>0) {{ceil(($v->userinfo->vip_time-time())/3600)}}h @else 0 @endif</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-secondary" role="button" href="{{url('admin/user/'.$v['id'].'/edit')}}"><span class="am-icon-pencil-square-o"></span>编辑</a>
                                            <!--<a class="am-btn am-btn-default am-btn-danger" role="button" href="#"><span class="am-icon-trash-o"></span>删除</a>-->
                                            <!-- <a class="am-btn am-btn-default am-btn-success" role="button" href="#"><span class="am-icon-copy"></span>历史</a> -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="am-cf">
                        
                        <div class="am-fr">
                            {!! $data->render() !!}
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
    function doSearch(obj){
        var search_type = $('.doSearch').val();
        var search_content = obj.siblings().first('input');
        console.log(search_content);
        console.log(search_type);
    }
</script>
@endsection