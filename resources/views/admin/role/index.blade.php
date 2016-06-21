@extends('admin.main')
@section('content')
<div class="container1">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <span>权限组管理</span>
    </div>
    <br>
    @include('errors.success')
    <div>
        <a href="{{ route('role') }}/create" class="pull-right btn btn-primary"><span class="icon-plus"></span> 添加权限组</a>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>权限组名</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    @if($role->id ==1)
                    <span class="bg-success text-success">超级管理员组</span>
                    <span class="btn btn-primary disabled"><span class="icon-lock"></span> 锁定</span>
                    @else
                        <a href="{{ route('role') }}/distribute/{{ $role->id }}" class="btn btn-primary"><span class="icon-cogs"></span> 分配权限</a>
                        <a href="{{ route('role') }}/show/{{ $role->id }}" class="btn btn-primary"><span class="icon-edit"></span> 编辑</a>
                        <a href="javascript:;" class="btn btn-danger delete" data-link="{{ route('role') }}/delete/{{ $role->id }}"><span class="icon-trash"></span> 删除</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(function(){
    //delete 
    $(".delete").click(function(){
        var name = $(this).parent().prev().text();
        var link = $(this).attr("data-link");
        if (confirm("确定要删除权限：" + name +"？")){
            window.open(link,"_self");
        };
    });
});
</script>
@endsection