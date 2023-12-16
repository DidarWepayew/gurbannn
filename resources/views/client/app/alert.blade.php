<div class="container-xl my-3">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="bi-check-circle-fill"></i> {!! session('success') !!}
        </div>
    @elseif(isset($success))
        <div class="alert alert-success" role="alert">
            <i class="bi-check-circle-fill"></i> {!! $success !!}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <i class="bi-x-circle-fill"></i> {!! session('error') !!}
        </div>
    @elseif(isset($error))
        <div class="alert alert-danger" role="alert">
            <i class="bi-x-circle-fill"></i>{!! $error !!}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
</div>