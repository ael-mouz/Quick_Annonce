<header>
    <div class="py-2" style="background:#5390ed">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div style="font-size: 16px;color:white">
                @if (auth()->check() && auth()->user()->role == 'admin')
                    <u><strong>Panel Admin</strong></u>
                @elseif (auth()->check() && auth()->user()->role == 'user')
                    <u><strong>Panel Member</strong></u>
                @else
                    <u><strong>Nouveau !</strong> Créez un compte aujourd'hui pour déposer votre annonce
                        gratuitement!</u>
                @endif
            </div>
            <div class="d-flex justify-content-between">
                @if (auth()->check())
                    <form class="nav-link pe-5" method="GET" action="{{ route('home') }}">
                        <img src="{{ asset('img/user.svg') }}" alt="user">
                        <button type="submit" class="btn btn-unstyled border-0" style="font-size: 20px;color:white"
                            disabled><u><strong>Bienvenue
                                    {{ auth()->user()->username }}
                                    !</strong></u></button>
                    </form>
                    <form class="nav-link pe-5" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <img src="{{ asset('img/lock.svg') }}" alt="user">
                        <button type="submit" class="btn btn-unstyled"style="font-size: 20px;color:white"><u><strong>
                                    déconnecter </strong></u></button>
                    </form>
                @else
                    <form class="nav-link pe-5" method="GET" action="{{ route('home') }}">
                        <img src="{{ asset('img/user.svg') }}" alt="user">
                        <button type="submit"
                            class="btn btn-unstyled"style="font-size: 20px;color:white"><u><strong>Créer
                                    compte</strong></u></button>
                    </form>
                    <form class="nav-link pe-5" method="GET" action="{{ route('home') }}">
                        <img src="{{ asset('img/lock.svg') }}" alt="user">
                        <button type="submit" class="btn btn-unstyled"
                            style="font-size: 20px;color:white"><u><strong>Se
                                    connecter</strong></u></button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <nav aria-label="row-2" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex justify-content-around">
            <div class="col-3">
                <img class="logo"src="{{ asset('img/logo.png') }}" alt="Quick annonce">
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Que recherchez-vous?" aria-label="Search"
                        aria-describedby="search-addon" />
                    <button type="button" class="btn" style="background:#5390ed">Chercher</button>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center" style="box-shadow: #4f4f4f 0px 10px 10px">
                    <img class="p-3" src="{{ asset('img/cart.svg') }}" alt="cart"
                    style="background:#4f4f4f;border-radius:5px 0  0 0;"></img>
                    <button type="button" class="p-2 border-0"
                    style="line-height: 8px;background: #97bbdb;border-radius:0 5px 0 0 ">
                    <a href="{{ route('create_announcement') }}" class="text-white">
                        <p>DEPOSER VOTRE</p>
                        <strong>ANNONCE</strong>
                    </a>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="btn-group rounded col-11" role="group" aria-label="Basic example" style="background: #1c5684">
            <a href="{{ route('announcement') }}" class="btn btn-lg btn-unstyled text-white">Accueil</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('immobilier_announcements') }}" class="text-white btn btn-lg btn-unstyled">Immobilier</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('multimedia_announcements') }}" class="text-white btn btn-lg btn-unstyled">Multimidia</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('maison_announcements') }}" class="text-white btn btn-lg btn-unstyled">Maison</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('vehicules_announcements') }}" class="text-white btn btn-lg btn-unstyled">Vehicules</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('emploi_announcements') }}" class="text-white btn btn-lg btn-unstyled">Emploi &
                Services</a>
            <div style="width:1px;background:white"></div>
            <a href="{{ route('objects_announcements') }}" class="text-white btn btn-lg btn-unstyled">Objects
                personnels</a>
        </div>
    </div>
</header>
