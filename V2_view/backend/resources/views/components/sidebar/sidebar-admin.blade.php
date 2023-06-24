<div class="side-bar col-2" id="side-bar">

    <button class="btn my-2" style="background: #4E90FE">My annonce</button>

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
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('validate_announcement_page') }}" class="text-white">Validation des annonces</a>
            </li>
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('show_city') }}" class="text-white">Gestion des villes</a>
        </li>
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('show_category') }}" class="text-white">Gestion des categories</a>
        </li>
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('show_users') }}" class="text-white">Supprimer un membre</a>
        </li>
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('delete_announcements_page') }}" class="text-white">Supprimer une annonces</a>
        </li>
    </ul>
</div>
