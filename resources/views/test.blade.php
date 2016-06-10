@extends('main')

@section('title')
<title>CPS mall ERP 测试</title>
@endsection

@section('content')
@include('errors.errors')
@include('errors.success')
<div class="container">
    <form action="/cps/name?age=12" method="get">
        <input type="text" name="name"><br>
        <button class="btn btn-primary">提交</button>
    </form>
    <p><a href="/cps/a{{ $wuserid }}">a</a></p>
    <p><a href="/cps/b{{ $wuserid }}">b</a></p>
    <p><a href="/cps/c{{ $wuserid }}">c</a></p>
</div>
@endsection