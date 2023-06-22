<div class="row" id="register">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="bar-banner">
            <img src="{{ asset('img/banner.svg') }}" alt="user">
            <div class="bar-banner-title">
                <img src="{{ asset('img/lock.svg') }}" alt="user">
                <span>Register</span>
            </div>
        </div>
        <input id="username" type="text" class="form-control mb-1 mt-2" name="username" placeholder="Nom d'utilisateur"
            autocomplete="off" required>
        <input id="first_name" type="text" class="form-control mb-1" name="first_name" placeholder="Prenom"
            autocomplete="off" required>
        <input id="last_name" type="text" class="form-control mb-1" name="last_name" placeholder="Nom"
            autocomplete="off" required>
        <input id="email" type="email" class="form-control mb-1" name="email" placeholder="Email"
            autocomplete="off" required>
        <input id="password" type="password" class="form-control mb-1" name="password" placeholder="Mot de pass"
            autocomplete="off" required>
        <input id="password_confirmation" type="password" class="form-control mb-1" name="password_confirmation"
            placeholder="Confirmer le mot de pass" autocomplete="off" required>
        <input id="phone" type="text" class="form-control mb-1" name="phone" placeholder="phone"
            autocomplete="off" required>
        <select class="form-select mb-1" name="gender" aria-label="gender" autocomplete="off" required>
            <option selected>Sexe</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>
