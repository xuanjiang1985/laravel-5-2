@extends('admin.main')
@section('content')
<div class="container">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <a href="{{ route('role') }}">权限组管理</a>
        <span class="icon-double-angle-right"></span>
        <span>编辑权限组</span>
    </div>
    <br>
    @include('errors.errors')
    <form class="form-inline" method="post" action="{{ route('role.update',['id' => $role->id])  }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" class="form-control" name="权限组名" value="{{ $role->name }}" placeholder="填写权限组名">
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
    
</div>
@endsection