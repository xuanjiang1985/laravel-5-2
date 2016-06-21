<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1.0 maximum-scale=1.0 user-scalable=no">
    <title>404</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <br><br>
        <div class="alert alert-danger">404! 此页面不存在。</div>
        <br>
        <p>
            <a href="{{ url('/') }}">返回首页</a>
            <span>或者</span>
            <a href="javascript:;" id="404-back">返回上页</a>
        </p>
    </div>
    <script src="{{ asset('/js/404.js') }}"></script>
</body>
</html>
