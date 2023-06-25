@extends('layouts.app')

@section('content')
    <form  action="{{ route('filter_announcement') }}" method="POST">
        @csrf
        <div class="row col-10 mb-1 mt-2 mx-auto">
            <div class="col">
                <label for="sortOption" class="form-label">order :</label>
                <select name="order" class="form-select">
                    <option value="asc">incrémenter</option>
                    <option value="desc">décrémenter</option>
                </select>
            </div>
            <div class="col">
                <label for="sortOption" class="form-label">Trier par :</label>
                <select name="sort" class="form-select">
                    <option value="id"></option>
                    <option value="title">Titre</option>
                    <option value="price">Prix</option>
                    <option value="created_at">Date</option>
                </select>
            </div>
            <div class="col">
                <label for="cityFilter" class="form-label">Ville :</label>
                <select name="city" class="form-select">
                    <option value=""></option>
                    @foreach ($city as $ct)
                        <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="categoryFilter" class="form-label">Categorie :</label>
                <select  name="category" class="form-select">
                    <option value=""></option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->sub_cat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3 mx-auto">
            <button type="submit" class="btn btn-success form-control">Filter</button>
        </div>
    </form>
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($announcement->isEmpty())
            <h1 class="text-center mt-5">Aucune annonce</h1>
        @else
            <table class="table table-hover">
                <caption class="text-center">Liste des annonces en attente de validation</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">Produit</th>
                        <th class="py-3 text-center col-2">Titre</th>
                        <th class="py-3 text-center col-2">Prix</th>
                        <th class="py-3 text-center col-2">Ville</th>
                        <th class="py-3 text-center col-2">Date</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Editer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcement as $ann)
                        <tr>
                            <td class="py-3 text-center">
                                <img src="{{ asset('images/' . $ann->picture_1) }}" alt="image" height="100px"
                                    width="150px">
                            </td>
                            <td class="py-3 text-center"><u>{{ $ann->title }}</u></td>
                            <td class="py-3 text-center"><strong>{{ $ann->price }}DH</strong></td>
                            <td class="py-3 text-center">{{ $ann->name }}</td>
                            <td class="py-3 text-center">{{ $ann->created_at }}</td>
                            @if (auth()->check())
                                <td class="py-3 text-center">
                                    <a href="{{ route('edit_announcements', $ann->ann_id) }}" class="btn btn-primary">
                                        Editer
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $announcement->links('vendor.pagination.bootstrap-5') }}
        @endif
    </div>
@endsection
