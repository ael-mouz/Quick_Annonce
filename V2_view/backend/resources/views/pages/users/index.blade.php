@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-11 mx-auto mt-2">
        @if ($users->isEmpty())
            <h1 class="text-center mt-5">Aucun utilisateur</h1>
        @else
            <table class="table table-hover">
                <caption class="text-center">Liste des utilisateurs</caption>
                <thead style="border-bottom:2px black solid">
                    <tr>
                        <th class="py-3 text-center col-2">Nom d'utilisateur</th>
                        <th class="py-3 text-center col-1">Prenom</th>
                        <th class="py-3 text-center col-1">Nom</th>
                        <th class="py-3 text-center col-3">Email</th>
                        <th class="py-3 text-center col-2">Phone</th>
                        <th class="py-3 text-center col-1">Genre</th>
                        <th class="py-3 text-center col-1">Role</th>
                        @if (auth()->check())
                            <th class="py-3 text-center col-1">Supprimer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-3 text-center"><u>{{ $user->username }}</u></td>
                            <td class="py-3 text-center">{{ $user->first_name }}</td>
                            <td class="py-3 text-center">{{ $user->last_name }}</td>
                            <td class="py-3 text-center">{{ $user->email }}</td>
                            <td class="py-3 text-center"><strong>(+212) </strong> {{ $user->phone }}</td>
                            <td class="py-3 text-center">{{ $user->gender }}</td>
                            <td class="py-3 text-center">{{ $user->role }}</td>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <td class="py-3 text-center">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links('vendor.pagination.bootstrap-5') }}
        @endif
    </div>
@endsection
