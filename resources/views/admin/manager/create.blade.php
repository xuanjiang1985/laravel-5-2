@extends('admin.main')
@section('content')
<div class="container">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <a href="{{ route('manager') }}">管理员管理</a>
        <span class="icon-double-angle-right"></span>
        <span>添加管理员</span>
    </div>
    <br>
    @include('errors.errors')
    <form class="form-horizontal" action="{{ route('manager.store') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>姓名</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="姓名" value="{{ old('姓名') }}" placeholder="输入姓名" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>账户</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" name="账户" value="{{ old('账户') }}" placeholder="输入email" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="密码" placeholder="输入至少8位密码" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>确认密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="密码_confirmation" placeholder="输入至少8位密码" required="required">
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