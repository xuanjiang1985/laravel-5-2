<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1.0 maximum-scale=1.0 user-scalable=no">
    @yield('title')
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/front.css')}}">
    <link rel="stylesheet" href="{{ asset('/fonts/css/font-awesome.min.css') }}">
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="/js/html5shiv.js"></script>
         <script src="/js/respond.min.js"></script>
         <link rel="stylesheet" href="/fonts/css/font-awesome-ie7.min.css">
      <![endif]-->
      <script src="{{asset('/js/jquery-1.12.4.min.js')}}"></script>
</head>
<body>
    <header>
      <div id="cps-login">
        @if(Auth::check())
        <div class="dropdown pull-right">
           <a href="javascript:;" class="dropdown-toggle" id="dropdownjack" data-toggle="dropdown">
            <i class="icon-user"></i>
              {{ Auth::user()->name }}
              <span class="icon-caret-down"></span>
           </a>
           <ul class="dropdown-menu drop-width" role="menu" aria-labelledby="dropdownjack" id="ul-login">
                <li role="presentation">
                 <a role="menuitem" tabindex="-1" href="{{ url('/setting') }}">个人设置</a>
                </li>
              <li role="presentation">
                 <a role="menuitem" tabindex="-1" href="{{ url('/logout') }}">退出登录</a>
              </li>
           </ul>
        </div>
        @else
        <a href="javascript:;" id="login"><span class="icon-user"></span> 登陆</a>
        @endif
      </div>
      <div class="clearfix"></div>
        <nav class="navbar container" role="navigation" id="cps-nav">
           <div class="navbar-header" id="cps-logo">
              <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="cps 运营logo"></a>
           </div>
           <div>
            <br class="hidden-xs">
              <ul class="nav navbar-nav" id="nav-ul">
                 <li><a href="/home">供应商</a></li>
                 <li><a href="/home1">新品图片</a></li>
                 <li><a href="#">叫外卖</a></li>
                 <li><a href="#">打卡</a></li>
                 <li><a href="#">美女</a></li>
                 <li><a href="#">生活馆</a></li>
                 <li><a href="#">推油</a></li>
                 <li><a href="#">桑拿</a></li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       快无边界<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                       <li><a href="/jackcare">jackcare</a></li>
                       <li><a href="#">EJB</a></li>
                       <li><a href="#">Jasper Report</a></li>
                       <li class="divider"></li>
                       <li><a href="#">分离的链接</a></li>
                       <li class="divider"></li>
                       <li><a href="#">另一个分离的链接</a></li>
                    </ul>
                 </li>
              </ul>
           </div>
        </nav>
        <hr>
    </header>
    @yield('content')
    <footer class="container bg-white">
        <br>
        <br>
        <div class="text-center">Copyright &copy; 2012 - 2016 CPS Mall. All Rights Reserved</div>
        <br>
    </footer>
</body>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/front.js')}}"></script>
</html>