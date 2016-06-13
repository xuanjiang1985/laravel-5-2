@extends('main')
@section('title')
<title>CPS mall ERP 后台登陆</title>
@endsection
@section('content')
<div class="container">
    @if(Session::has('status'))
    <div class="alert alert-danger">{{ Session::get('status') }}</div>
    @endif
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
@endsection
