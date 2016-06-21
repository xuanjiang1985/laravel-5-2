@extends('admin.main')
@section('content')
<div class="container1">
    <h4>permession center</h4>
    @include('errors.success')
    <div>
        <a href="{{ route('permession') }}/create" class="pull-right btn btn-primary"><span class="icon-plus"></span> Add Permession</a>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Item</th>
                <th>Sort</th>
                <th>Route name</th>
                <th>Man name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permessions as $permession)
            <tr>
                <td>
                    <input type="number" class="item" id="item-{{ $permession->id }}" value="{{ $permession->item_id }}" data-link="{{ route('permession') }}/item/{{ $permession->id }}">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
                <td>
                    <input type="number" class="sort" id="{{ $permession->id }}" value="{{ $permession->sort_id }}" data-link="{{ route('permession') }}/sort">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
                <td>{{ $permession->route_name }}</td>
                <td>{{ $permession->man_name }}</td>
                <td>
                    <a href="{{ route('permession') }}/show/{{ $permession->id }}" class="btn btn-primary"><span class="icon-edit"></span> Edit</a>
                    <a href="javascript:;" class="btn btn-danger delete" data-link="{{ route('permession') }}/delete/{{ $permession->id }}"><span class="icon-trash"></span> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(function(){
    //分类
    $(".item").blur(function(){
            var id = $(this).attr("id");
            var value = $(this).val();
            var link = $(this).attr("data-link");
            $(this).next().html('<span class="icon-spin icon-spinner"></span>');
            $.ajax({
                type: 'get',
                url: link,
                dataType:'json',
                data: {'value':value},
                success: function(data){
                    $("#" + id).next().html('<span class="icon-ok text-success"></span>');
                },
                error: function(info){
                    $("#" + id).next().html('<span class="icon-warning-sign text-danger"></span>');
                }
            });
        });
    //排序
    $(".sort").blur(function(){
            var id = $(this).attr("id");
            var value = $(this).val();
            var link = $(this).attr("data-link");
            $(this).next().html('<span class="icon-spin icon-spinner"></span>');
            $.ajax({
                type: 'get',
                url: link + '/' + id,
                dataType:'json',
                data: {'value':value},
                success: function(data){
                    $("#" + id).next().html('<span class="icon-ok text-success"></span>');
                },
                error: function(info){
                    $("#" + id).next().html('<span class="icon-warning-sign text-danger"></span>');
                }
            });
        });
    //delete 
    $(".delete").click(function(){
        var man_name = $(this).parent().prev().text();
        var link = $(this).attr("data-link");
        if (confirm("确定要删除权限：" + man_name +"？")){
            window.open(link,"_self");
        };
    });
});
</script>
@endsection