<form method="POST" action="{{ route('login') }}">
    @csrf
    <div id="login-bar">
        <img src="{{ asset('img/lock.svg') }}" alt="user">
        Se Connecter
    </div>
    <div id="login-bar-line"></div>
    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
    <br>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
