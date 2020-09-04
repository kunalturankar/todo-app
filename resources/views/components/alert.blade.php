<div>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>

    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>