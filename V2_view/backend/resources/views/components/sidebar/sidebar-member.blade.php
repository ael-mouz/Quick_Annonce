<div class="side-bar col-2" id="side-bar">
    @if (auth()->check())
        <button class="btn my-2" style="background: #4E90FE">My annonce</button>
    @else
        @include('components.auth.login')
    @endif
    <br>
    <div class="bar-banner">
        <img src="{{ asset('img/banner2.svg') }}" alt="user" width="100%">
        <div class="bar-banner-title">
            <img src="{{ asset('img/lock.svg') }}" alt="user">
            <span>Menu</span>
        </div>
    </div>
    <ul class="list-group list-group-flush mt-2">
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('announcement') }}" class="text-white">Accueil</a>
        </li>
        <li class="list-group-item" style="background: #4E90FE">immobilier</li>
        <li class="list-group-item" style="background: #4E90FE">multimidia</li>
        <li class="list-group-item" style="background: #4E90FE">maison</li>
        <li class="list-group-item" style="background: #4E90FE">vehicules</li>
        <li class="list-group-item" style="background: #4E90FE">emploi & servicess</li>
        <li class="list-group-item" style="background: #4E90FE">objects personnels</li>
    </ul>
</div>
