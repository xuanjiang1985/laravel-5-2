@extends('admin.main')
@section('content')
<div class="container">
    <div>
        <span class="icon-map-marker"> 导航</span>
        <span class="icon-double-angle-right"></span>
        <a href="{{ route('role') }}">权限组管理</a>
        <span class="icon-double-angle-right"></span>
        <span>{{ $role->name }}</span>
        <span class="icon-double-angle-right"></span>
        <span>分配权限</span>
    </div>
    <br>
    <form action="{{ route('role.distribute', ['id' => $role->id]) }}" method="post">
        {!! csrf_field() !!}
        <div class="panel panel-default">
           <div class="panel-heading">
              <h3 class="panel-title">
                 后台管理员及权限管理
                 <span class="btn btn-info btn-xs yes">全选</span>
                 <span class="btn btn-info btn-xs no">全不选</span>
              </h3>
           </div>
           <div class="panel-body">
              <ul class="ul-permession">
                @foreach($item_1 as $item)
                 @if(in_array($item->id, $role_permession))
                 <li><label><input type="checkbox" name="chkvalue[]" value="{{ $item->id }}" checked="checked"> {{ $item->man_name}}</label></li>
                 @else
                 <li><label><input type="checkbox" name="chkvalue[]" value="{{ $item->id }}"> {{ $item->man_name}}</label></li>
                 @endif
                @endforeach
              </ul>
           </div>
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
<script>
$(function(){
//input checkbox
    $(".yes").click(function(){
        $(this).parent().parent().next().find("input[type='checkbox']").prop("checked",true);
    });
    $(".no").click(function(){
        $(this).parent().parent().next().find("input[type='checkbox']").prop("checked",false);
    });
});
</script>
@endsection