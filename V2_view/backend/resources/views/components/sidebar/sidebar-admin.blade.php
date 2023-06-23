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
        <li class="list-group-item" style="background: #4E90FE">Accueil</li>
        <li class="list-group-item" style="background: #4E90FE">Validation des annonces</li>
        <li class="list-group-item" style="background: #4E90FE">Gestion des villes</li>
        <li class="list-group-item" style="background: #4E90FE">Gestion des categories</li>
        <li class="list-group-item" style="background: #4E90FE">
            <a href="{{ route('users.index') }}" class="text-white">Supprimer un membre</a>
        </li>
        <li class="list-group-item" style="background: #4E90FE">Supprimer une annonces</li>
    </ul>
</div>
