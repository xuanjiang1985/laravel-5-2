@extends('admin.main')
@section('content')
<div class="container">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <a href="{{ route('manager') }}">管理员管理</a>
        <span class="icon-double-angle-right"></span>
        <span>{{ $manager->name }}</span>
        <span class="icon-double-angle-right"></span>
        <span>管理员分组</span>
    </div>
    <br>
    @include('errors.errors')
    <form class="form-horizontal" action="{{ route('manager.branch',['id' => $manager->id]) }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="red-remind">*</span>选择分组</label>
            <div class="col-sm-3">
                <select name="分组" class="form-control" required="required">
                    <option value="">-- 请选择权限组 --</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    <option value="0">删除分组</option>
                </select>
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