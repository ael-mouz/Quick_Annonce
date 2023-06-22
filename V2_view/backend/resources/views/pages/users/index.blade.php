@extends('layouts.app')

@section('content')
    <div class="table-responsive rounded col-10 mx-auto mt-5">
        <table class="table table-hover">
            <thead class="table-info" style="background: #4E90FE">
                <tr>
                    <th class="py-3">Username</th>
                    <th class="py-3">First Name</th>
                    <th class="py-3">Last Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Phone</th>
                    <th class="py-3">Gender</th>
                    <th class="py-3">Role</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-3">{{ $user->username }}</td>
                        <td class="py-3">{{ $user->first_name }}</td>
                        <td class="py-3">{{ $user->last_name }}</td>
                        <td class="py-3">{{ $user->email }}</td>
                        <td class="py-3">{{ $user->phone }}</td>
                        <td class="py-3">{{ $user->gender }}</td>
                        <td class="py-3">{{ $user->role }}</td>
                        <td class="py-3">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
