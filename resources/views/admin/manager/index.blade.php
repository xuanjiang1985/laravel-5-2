@extends('admin.main')
@section('content')
<div class="container">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <span>管理员管理</span>
    </div>
    <br>
    @include('errors.success')
    <div>
        <a href="{{ route('manager') }}/create" class="pull-right btn btn-primary"><span class="icon-plus"></span> 添加管理员</a>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>管理员姓名</th>
                <th>管理员账户</th>
                <th style="width:150px;">隶属权限组</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($managers as $manager)
            <tr>
                <td>{{ $manager->name }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->hasRole->getRole->name or "未分组"}}</td>
                <td>{{ substr($manager->created_at,0,11) }}</td>
                <td>
                    @if($manager->id == 1)
                    <span class="bg-success text-success">系统指定超管</span>
                    <span class="btn btn-primary disabled"><span class="icon-lock"></span> 锁定</span>
                    @else
                        <a href="{{ route('manager') }}/branch/{{ $manager->id }}" class="btn btn-primary"><span class="icon-group"></span> 分组</a>
                        <a href="#" class="btn btn-primary"><span class="icon-edit"></span> 编辑</a>
                        <a href="#" class="btn btn-danger"><span class="icon-trash"></span> 删除</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection