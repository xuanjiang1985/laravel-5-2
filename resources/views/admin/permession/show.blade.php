@extends('admin.main')
@section('content')
<div class="container">
    <h4>Edit permession</h4>
    @include('errors.errors')
    <form class="form-inline" method="post" action="{{ route('permession') }}/show/{{ $permession->id }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" class="form-control" name="route" value="{{ $permession->route_name }}" placeholder="router name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="man" value="{{ $permession->man_name }}" placeholder="man name">
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>
@endsection