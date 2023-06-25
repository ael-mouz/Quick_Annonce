@extends('layouts.app')

@section('content')
    <div class="row" id="register">
        <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="bar-banner">
                <img src="{{ asset('img/banner.svg') }}" alt="user">
                <div class="bar-banner-title">
                    <img src="{{ asset('img/lock.svg') }}" alt="user">
                    <span>Ajouter des categories</span>
                </div>
            </div>
            <select name="cat" class="mb-1 mt-2 form-control" autocomplete="off" required>
                <option value="Immobilier">Immobilier</option>
                <option value="Multimidia">Multimidia</option>
                <option value="Maison">Maison</option>
                <option value="Vehicules">Vehicules</option>
                <option value="Emploi & Services">Emploi & Services</option>
                <option value="Objects personnels">Objects personnels</option>
            </select>
            <input type="text" name="sub_cat" class="mb-1 mt-2 form-control" placeholder="Sub categoreis"
                autocomplete="off" required>
            <textarea name="description" class="mb-1 form-control" placeholder="Description" autocomplete="off" required></textarea>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
