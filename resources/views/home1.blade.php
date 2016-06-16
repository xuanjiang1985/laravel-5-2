@extends('main')

@section('title')
<title>CPS mall ERP home1</title>
@endsection

@section('content')
@include('errors.errors')
@include('errors.success')
<div class="container bg-white">
    <br><br><br>
    <br><br><br>
    <br><br><br>
    {{ route('home.index')->getUri() }}
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
@endsection