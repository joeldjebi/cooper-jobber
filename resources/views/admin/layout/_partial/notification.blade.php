@if(session()->has('message'))
<div class="notification {{ session()->get('type') }} closeable">
    <p>{{ session()->get('message') }}</p>
    <a class="close"></a>
</div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="notification error closeable">
            <p>{{ $error }}</p>
            <a class="close"></a>
        </div>
    @endforeach
@endif

