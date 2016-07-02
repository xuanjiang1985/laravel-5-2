<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <title>something</title>
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
<div class="container">
    @if(Session::has('status'))
    <div class="alert alert-danger">{{ Session::get('status') }}</div>
    @endif
    <br>
    <div class="row">
        @if(Auth::guard('admin')->check())
        <div class="alert alert-success"><span class="icon-ok"></span> 已经登陆。</div>
        @else
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">后台登陆</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="{{ url('/jackadmin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</body>
