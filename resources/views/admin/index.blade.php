@extends('layout.admin')
@section('link')
    <link rel="stylesheet" type="text/css" href="/admins/css/admin_index.css">
@endsection
@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title am-icon-home" >
        首页
    </div>
    <p class="am-text-xxl am-text-secondary am-text-center">欢迎进入老司机视频网后台</p>
    <hr/>
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
      <tr>
        <td align="left" valign="top" width="50%">
            <div class=" am-text-default">网站信息</div>
            <div class="main-con am-text-default" >
            注册账户：开启<br/>
                购买会员：开启<br/>
                管理员个数：<font color="#538ec6"><strong>5</strong></font> 人<br/>
                网站IP：10.11.217.50<br/>
                程序编码：UTF-8<br/>
            </div>
        </td>
        <td align="left" valign="top" width="49%">
            <div class=" am-text-default">服务器信息</div>
            <div class="main-con am-text-default">
            服务器软件：Apache/2.2.6 (Win32) PHP/5.2.5<br/>
            PHP版本：5.2.5<br/>
            MYSQL版本：5.0.45-community-nt<br/>
            魔术引用：开启 (建议开启)<br/>
            使用域名：www.laosiji.com <br/>
            </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">
            <div class="main-con am-text-danger">系统提示</div>
            <div class="main-order">1=>如您在使用过程有发现出错请及时与我们取得联系；为保证您得到我们的后续服务，强烈建议您购买我们的正版系统或向我们定制系统！<br/>
                                    2=>强烈建议您将IE7以上版本或其他的浏览器</div>
        </td>
      </tr>
    </table>
</div>

@endsection
