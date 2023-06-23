<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="bar-banner">
        <img src="{{ asset('img/banner2.svg') }}" alt="user" style="width: 100%">
        <div class="bar-banner-title">
            <img src="{{ asset('img/lock.svg') }}" alt="user">
            <span>Se Connecter</span>
        </div>
    </div>
    <div class="mt-2">
        <div class="row">
            <div class="col-7">
                <input id="username" type="text" class="form-control mb-1" name="username"
                    placeholder="Nom d'utilisateur" required>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <input id="password" type="password" class="form-control mb-1" name="password"
                    placeholder="Mot de pass" required>
            </div>
            <div class="form-group col-2 ">
                <button type="submit" class="btn btn-primary">Connexion</button>
            </div>
        </div>
    </div>
</form>
