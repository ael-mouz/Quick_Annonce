@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@error('username')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('first_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('last_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('gender')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
