@if (Session::has('success'))
    <div class="pt-3">
        <div class="allert allert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif