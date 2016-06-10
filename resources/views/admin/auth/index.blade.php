<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理中心</title>
</head>
<body>
    <h3 class="text-center">欢迎来到后台管理中心</h3>
    <div>你已登陆 {{ Auth::guard('admin')->user()->name }}</div>
    <br>
    <a href="/" target="_blank">网站首页</a><br>
    <a href="{{ route('admin') }}/logout">安全退出</a>
</body>
</html>