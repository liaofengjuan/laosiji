@extends('layout.admin')
<div class="tpl-portlet-components" >
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 列表
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
                        <a class="am-btn am-btn-default am-btn-danger" role="button" href="#" target="main"><span class="am-icon-trash-o"></span>批量删除</a>
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
                                <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>手机</th>
                                <th>年龄</th>
                                <th>性别</th>
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
                                <td>{{$v->userinfo->username}}</td>
                                <td>{{$v->phone}}</td>
                                <td>{{$v->userinfo->age}}</td>
                                <td>{{$v->userinfo->sex}}</td>
                                <td>{{$v->userinfo->email}}</td>
                                <td>{{$v->userinfo->authority}}</td>
                                <td>{{$v->userinfo->status}}</td>
                                <td>{{date('H:i:s',$v->userinfo->vip_time-time())}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 历史</button>
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