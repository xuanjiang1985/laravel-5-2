@extends('admin.main')
@section('content')
<div class="container1">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <span>修改我的密码</span>
    </div>
    <br>
    <br>
    @include('errors.errors')
    <form class="form-horizontal" action="{{ route('admin') }}/password/update" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="密码" placeholder="输入至少8位密码">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">确认新密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="密码_confirmation" placeholder="输入至少8位密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
</div>
@endsection