@extends('layout.admin')
@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">友情链接管理</a></li>
        <li class="am-active">新增友情链接</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-plus"></span> 新增友情链接
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                
            </div>


        </div>
        <div class="tpl-block ">

            <div class="am-g tpl-amazeui-form">


                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal" >
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">链接名称</label>
                            <div class="am-u-sm-9">
                                <input type="text"name="title" value="" id="title" placeholder="请输入友情链接名称" >
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="url" class="am-u-sm-3 am-form-label">链接地址</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="url" id="url" placeholder="请输入链接地址">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="logo" class="am-u-sm-3 am-form-label">logo图片</label>
                            <div class="am-u-sm-9">
                                <input type="file" value="" name="logo" id="logo">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary">添加友情链接</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection