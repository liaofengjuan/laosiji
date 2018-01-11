@extends('layout.admin')
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">友情链接</a></li>
        <li class="am-active">友情链接列表</li>
    </ol>
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-navicon"></span> 友情链接列表
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
                        <a class="am-btn am-btn-default am-btn-success" role="button" href="{{url('admin/friend/create')}}" target="main"><span class="am-icon-plus"></span>新增友情链接</a>
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
                                  <th>编号</th>
                                  <th>链接logo</th>
                                  <th>链接名称</th>
                                  <th>链接地址</th>
                                  <th>添加时间</th>
                                  <th>状态</th>
                                  <th>操作</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($data as $v)
                            <tr class="gradeX">
                                <td>{{$v['id']}}</td>
                                <td>{{$v->logo}}</td>
                                <td>{{$v->title}}</td>
                                <td>{{$v->path}}</td>
                                <td>{{$v->create_at}}</td>
                                <td>{{$v->state}}</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <class="am-btn-group am-btn-group-xs">
                                        <form action="{{url('admin/friend/'.$v['id'].'/destroy')}}" method='post' style='display :inline;'>
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                          <button class='btn btn-waring btn-xs'><span class="am-icon-pencil-square-o"></span>删除</button>
                                        </form>
                                        <class="am-btn-group am-btn-group-xs">
                                        <form action="{{url('admin/friend/'.$v['id'].'/edit')}}" method="GET" style='display:inline;'>
                                          {{ csrf_field() }}
                                          {{ method_field('PUT') }}
                                          <button class='btn btn-info btn-xs'><span class="am-icon-pencil-square-o"></span>修改</button>
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
    
@endsection