@if (Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <span class="icon-ok"></span>
        {{ Session::get('success') }}
    </div>
@endif