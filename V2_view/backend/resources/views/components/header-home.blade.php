<header>
    <div class="bg-info py-2">
        <div class="container d-flex justify-content-between">
            <div>
                @if (auth()->check())
                    <strong>Panel Member</strong>
                @else
                    <strong>Nouveau !</strong> Créez un compte aujourd'hui pour déposer votre annonce gratuitement!
                @endif
            </div>
            <div class="d-flex justify-content-between">
                @if (auth()->check())
                    <div class="nav-link pe-5">
                        <img src="{{ asset('img/user.svg') }}" alt="user">
                        <strong>Bienvenue {{ auth()->user()->name }} !</strong>
                    </div>
                    <a class="nav-link pe-5" href="{{ route('logout') }}">
                        <img src="{{ asset('img/lock.svg') }}" alt="user">
                            <strong>Se déconnecter</strong>
                    </a>
                @else
                    <div class="nav-link pe-5">
                        <img src="{{ asset('img/user.svg') }}" alt="user">

                        <strong>Créer compte</strong>
                    </div>
                    <div class="nav-link pe-5">
                        <img src="{{ asset('img/lock.svg') }}" alt="user">
                        <strong>Se connecter</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <nav aria-label="row-2" class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-between">
            <div>
                <img class="logo"src="{{ asset('img/logo.png') }}" alt="Quick annonce">
            </div>
            <div>
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
            <div>
                <div class="input-group">
                    <img class="form-control btn btn-secondary" src="{{ asset('img/cart.svg') }}" alt="cart"></img>
                    <button type="button" class="btn btn-primary">Annonce</button>
                </div>
            </div>
        </div>
    </nav>
    <div class="btn-group form-control bg-primary rounded" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary">accueil</button>
        <button type="button" class="btn btn-primary">immobilier</button>
        <button type="button" class="btn btn-primary">multimidia</button>
        <button type="button" class="btn btn-primary">maison</button>
        <button type="button" class="btn btn-primary">vehicules</button>
        <button type="button" class="btn btn-primary">emploi & services</button>
        <button type="button" class="btn btn-primary">objects personnels</button>
    </div>
</header>
