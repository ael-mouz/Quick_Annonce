@extends('layouts.app')

@section('content')
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
                        @if (auth()->check() && auth()->user()->role == 'admin')
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
                            @if (auth()->check() && auth()->user()->role == 'admin')
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
