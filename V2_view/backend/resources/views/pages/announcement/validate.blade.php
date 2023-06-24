@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($announcement->isEmpty())
            <h1 class="text-center mt-5">Aucune annonce en attente de validation</h1>
        @else
            <table class="table table-hover">
                <caption class="text-center">Liste des annonces en attente de validation</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">Produit</th>
                        <th class="py-3 text-center col-2">Titre</th>
                        <th class="py-3 text-center col-2">Prix</th>
                        <th class="py-3 text-center col-2">Ville</th>
                        <th class="py-3 text-center col-1">Statut</th>
                        <th class="py-3 text-center col-2">Date</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Valider</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcement as $ann)
                        <tr>
                            <td class="py-3 text-center">{{ $ann->picture_1 }}</td>
                            <td class="py-3 text-center"><u>{{ $ann->title }}</u></td>
                            <td class="py-3 text-center"><strong>{{ $ann->price }}DH</strong></td>
                            <td class="py-3 text-center">{{ $ann->name }}</td>
                            <td class="py-3 text-center">
                                <div class="bg-warning text-white text-center rounded py-2">En attente</div>
                            </td>
                            <td class="py-3 text-center">{{ $ann->created_at }}</td>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <td class="py-3 text-center">
                                    <form action="{{ route('validate_announcement', $ann->ann_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Valider</button>
                                    </form>
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
