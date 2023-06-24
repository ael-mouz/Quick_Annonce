@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($city->isEmpty())
            <h1 class="text-center mt-5">Aucune ville</h1>
        @else
            <table class="table table-hover">
                <caption class="text-center">Liste des villes</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">zip code</th>
                        <th class="py-3 text-center col-8">name</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Editer</th>
                            <th class="py-3 text-center col-1">Supprimer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($city as $Itemcity)
                        <tr>
                            <td class="py-3 text-center"><strong>{{ $Itemcity->zip_code }}</strong></td>
                            <td class="py-3 text-center">{{ $Itemcity->name }}</td>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <td class="py-3 text-center">
                                    <a href="{{ route('edit_city', $Itemcity->id) }}" class="btn btn-primary">Editer</a>
                                </td>
                                <td class="py-3 text-center">
                                    <form action="{{ route('delete_city', $Itemcity->id) }}" method="POST">
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
            {{ $city->links('vendor.pagination.bootstrap-5') }}
        @endif
    </div>
@endsection
