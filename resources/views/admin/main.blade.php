<!DOCTYPE html>
<head></head>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('/fonts/css/font-awesome.min.css') }}">
    <script src="{{asset('/js/jquery-1.12.4.min.js')}}"></script>
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="/js/html5shiv.js"></script>
         <script src="/js/respond.min.js"></script>
         <link rel="stylesheet" href="/fonts/css/font-awesome-ie7.min.css">
      <![endif]-->
</head>
<body>
<header class="bg-primary" id="header">
    <div class="pull-right" id="login-width">
        @if(Auth::guard('admin')->check())
        <div class="dropdown pull-right">
           <a href="#" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
            <i class="icon-user"></i>
              {{ Auth::guard('admin')->user()->name }}
              <span class="icon-caret-down"></span>
           </a>
           <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation">
                 <a role="menuitem" tabindex="-1" href="{{ route('admin') }}/password">修改密码</a>
                </li>
              <li role="presentation">
                 <a role="menuitem" tabindex="-1" href="{{ route('admin') }}/logout">退出登录</a>
              </li>
           </ul>
        </div>
        @endif
    </div>
        <a href="javascript:;" class="visible-xs-inline" id="xs-menu"><i class="icon-th-list"></i> 导航栏</a>
        &nbsp;<a href="/" target="_blank" class="hidden-xs"><i class="icon-home"></i> 网站主页</a>
</header>
<div class="clearfix"></div>
  <div>
    <div class="hidden-xs col-sm-2" id="aside-center">
            <aside class="aside">
              <ul class="aside-ul">
                  
                      <li class="aside-ul-li" data-item="1">后台管理员及权限管理<span class="icon-angle-left pull-right"></span>
                          <ul class="aside-ul-2">                
                                <li><a href="{{ route('manager') }}"><span class="icon-caret-right"></span> 管理员管理</a></li>
                                <li><a href="{{ route('role') }}"><span class="icon-caret-right"></span> 权限组管理</a></li>   
                          </ul>
                      </li>
                      <li class="aside-ul-li" data-item="2">文章管理<span class="icon-angle-left pull-right"></span>
                          <ul class="aside-ul-2">
                                <li><a href="#"><span class="icon-caret-right"> 所有管理员</a></li> 
                          </ul>
                      </li>           
              </ul>
            </aside>
    </div>
    <div class="col-sm-10">
    @yield('content')
    </div>
  </div>
  <br>
  <script src="{{asset('/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/js/admin.js')}}"></script>
</body>
</html>