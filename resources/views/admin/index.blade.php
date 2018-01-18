@extends('layout.admin')

@section('content')
<div class="tpl-portlet-components" >
    <div class="tpl-content-page-title">
        首页
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
                <li class="am-active">内容</li>
            </ol>
        	
                <p class="am-text-xxl am-text-secondary am-text-center">欢迎进入老司机视频网后台</p>
                <hr/>
         <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <style>
            body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
            #main{ font-size:12px;}
            #main span.time{ font-size:24px; color:#528dc5; width:100%; padding-bottom:10px; float:left}
            div.sec{ width:100%; background: no-repeat 0 15px; padding:0 0 0 15px; line-height:45px; float:left}
            .left{ float:left}
            #main div a{ float:left}
            #main span.num{  font-size:30px; color:#538ec6; font-family:"Georgia","Tahoma","Arial";}
            .left{ float:left}
           
            div.main-con{ width:100%; float:left; padding:10px 0 0 20px; line-height:36px;}
            
            div.main-order{ line-height:30px; padding:10px 0 0 0;}
            </style>
            </head>
            <body>
            <!--main_top-->
            <table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
              <tr>
                <td colspan="2" align="left" valign="   `">
                <span class="time"><strong>您好！</strong><u>[超级管理员]</u></span>
                <div class="top am-text-default"><span class="left am-text-default">您上次的登灵时间：2018-01-17 16:00   登录IP：10.11.217.69 &nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时</span><a href="index.html" target="mainFrame" onFocus="this.blur()">更改密码</a></div>
                <div class="sec">这是您第<span class="num ">80</span>次,登录！</div>
                </td>
              </tr>
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
            </body>
        </html>
    </div>
</div>

@endsection
