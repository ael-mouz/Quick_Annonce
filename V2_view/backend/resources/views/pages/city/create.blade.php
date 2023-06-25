@extends('layouts.app')

@section('content')
    <div class="row" id="register">
        <form action="{{ route('store_city') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="bar-banner">
                <img src="{{ asset('img/banner.svg') }}" alt="user">
                <div class="bar-banner-title">
                    <img src="{{ asset('img/lock.svg') }}" alt="user">
                    <span>Ajouter des villes</span>
                </div>
            </div>
            <input type="text" name="name" class="mb-1 mt-2 form-control"
                placeholder="name" autocomplete="off" required>
            <input type="number" name="zip_code" class="mb-1 form-control"
                placeholder="zip code" autocomplete="off" required>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
