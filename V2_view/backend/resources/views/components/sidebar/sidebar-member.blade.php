<div class="side-bar col-2" id="side-bar">
    @if (auth()->check())

    <a href="{{ route('my_announcement') }}">
        <button class="btn my-2 text-white" style="background: #4E90FE">My annonce</button>
    </a>
    @else
        @include('components.auth.login')
    @endif
    <br>
    <div class="bar-banner">
        <img src="{{ asset('img/banner2.svg') }}" alt="user" width="100%">
        <div class="bar-banner-title text-white">
            <img src="{{ asset('img/lock.svg') }}" alt="user">
            <span>Menu</span>
        </div>
    </div>
    <ul class="list-group list-group-flush mt-2">
        <a href="{{ route('announcement') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Accueil
            </li>
        </a>
        <a href="{{ route('immobilier_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Immobilier
            </li>
        </a>
        <a href="{{ route('multimedia_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Multimidia
            </li>
        </a>
        <a href="{{ route('maison_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Maison
            </li>
        </a>
        <a href="{{ route('vehicules_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Vehicules
            </li>
        </a>
        <a href="{{ route('emploi_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Emploi & Services
            </li>
        </a>
        <a href="{{ route('objects_announcements') }}">
            <li class="list-group-item text-white" style="background: #4E90FE">
                Objects personnels
            </li>
        </a>
    </ul>
</div>
