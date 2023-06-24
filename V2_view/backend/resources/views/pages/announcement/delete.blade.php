@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($announcement->isEmpty())
            <h1 class="text-center mt-5">Aucune annonce</h1>
        @else
            <table class="table table-hover">
                <caption class="text-center">Liste des annonces</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">Produit</th>
                        <th class="py-3 text-center col-2">Titre</th>
                        <th class="py-3 text-center col-2">Prix</th>
                        <th class="py-3 text-center col-2">Ville</th>
                        <th class="py-3 text-center col-2">Date</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Supprimer</th>
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
                            <td class="py-3 text-center">{{ $ann->created_at }}</td>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <td class="py-3 text-center">
                                    <form action="{{ route('delete_announcements', $ann->ann_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
