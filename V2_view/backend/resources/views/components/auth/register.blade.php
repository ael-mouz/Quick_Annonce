<div class="row" id="register">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div id="register-bar">
            <img src="{{ asset('img/lock.svg') }}" alt="user">
            Register
        </div>
        <div id="register-bar-line"></div>
        <input id="name" type="text" class="form-control" name="name" placeholder="Name" required>
        <br>
        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
        <br>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        <br>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
            placeholder="Confirm Password" required>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
