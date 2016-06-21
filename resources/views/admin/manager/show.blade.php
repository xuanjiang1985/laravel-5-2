@extends('admin.main')
@section('content')
<div class="container1">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <a href="{{ route('manager') }}">管理员管理</a>
        <span class="icon-double-angle-right"></span>
        <span>编辑管理员</span>
        <span class="icon-double-angle-right"></span>
        <span>{{ $user->name }}</span>
    </div>
    <br>
    <br>
    @include('errors.errors')
    <form class="form-horizontal" action="{{ route('manager.update',['id' => $user->id]) }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>姓名</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="姓名" value="{{ $user->name }}" placeholder="输入姓名" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>账户</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" name="账户" value="{{ $user->email }}" placeholder="输入email" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="密码" placeholder="留空即不重置密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </form>
</div>
@endsection