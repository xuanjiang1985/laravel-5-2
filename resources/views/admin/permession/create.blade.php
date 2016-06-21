@extends('admin.main')
@section('content')
<div class="container1">
    <h4>Add a permession</h4>
    @include('errors.errors')
    <form class="form-inline" method="post" action="{{ route('permession') }}/create">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" class="form-control" name="route" value="{{ old('route') }}" placeholder="router name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="man" value="{{ old('man') }}" placeholder="man name">
        </div>
        <button type="submit" class="btn btn-primary">添加</button>
    </form>
</div>
@endsection