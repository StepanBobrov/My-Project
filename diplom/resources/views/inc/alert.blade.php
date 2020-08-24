@if(session('success'))
    <div class="alert alert-primary">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-warning" role="alert">
        {{ session('error') }}
    </div>
@endif
