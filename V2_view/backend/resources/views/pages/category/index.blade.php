@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($category->isEmpty())
            <h1 class="text-center mt-5">Aucune categorie</h1>
        @else
            <a href="{{ route('create_category') }}" class="btn btn-success text-white">Ajouter des ctaegories</a>
            <table class="table table-hover">
                <caption class="text-center">Liste des categories</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">category</th>
                        <th class="py-3 text-center col-2">sub category</th>
                        <th class="py-3 text-center col-6">description</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Editer</th>
                            <th class="py-3 text-center col-1">Supprimer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td class="py-3 text-center">{{ $cat->cat }}</td>
                            <td class="py-3 text-center">{{ $cat->sub_cat }}</td>
                            <td class="py-3 text-center">{{ $cat->description }}</td>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <td class="py-3 text-center">
                                    <a href="{{ route('edit_category', $cat->id) }}" class="btn btn-primary">Editer</a>
                                </td>
                                <td class="py-3 text-center">
                                    <form action="{{ route('delete_category', $cat->id) }}" method="POST">
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
            {{ $category->links('vendor.pagination.bootstrap-5') }}
        @endif
    </div>
@endsection
