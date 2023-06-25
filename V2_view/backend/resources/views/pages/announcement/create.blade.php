@extends('layouts.app')

@section('content')
    <div class="row" id="register">
        <form action="{{ route('store_announcement') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="bar-banner">
                <img src="{{ asset('img/banner.svg') }}" alt="user">
                <div class="bar-banner-title">
                    <img src="{{ asset('img/lock.svg') }}" alt="user">
                    <span>Creez votre annonce</span>
                </div>
            </div>
            <input type="text" name="username" value="{{ auth()->user()->username }}" class="mb-1 mt-2 form-control"
                placeholder="Username" autocomplete="off" required>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="mb-1 form-control"
                placeholder="Email" autocomplete="off" required>
            <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="mb-1 form-control"
                placeholder="Phone" autocomplete="off" required>
            <select name="category" class="mb-1 form-control" autocomplete="off" required>
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->sub_cat }}</option>
                @endforeach
            </select>
            <select name="city" class="mb-1 form-control" autocomplete="off" required>
                @foreach ($city as $ct)
                    <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                @endforeach
            </select>
            <input type="text" name="title" class="mb-1 form-control" placeholder="Title" autocomplete="off" required>
            <textarea name="description" class="mb-1 form-control" placeholder="Description" autocomplete="off" required></textarea>
            <input type="number" name="price" class="mb-1 form-control" placeholder="Price" autocomplete="off" required>
            <input type="file" name="picture_1" class="mb-1 form-control-file" placeholder="Picture 1" autocomplete="off"
                required>
            <input type="file" name="picture_2" class="mb-1 form-control-file" placeholder="Picture 2" autocomplete="off"
                required>
            <input type="file" name="picture_3" class="mb-1 form-control-file" placeholder="Picture 3" autocomplete="off"
                required>
            <input type="file" name="picture_4" class="mb-1 form-control-file" placeholder="Picture 4" autocomplete="off"
                required>
            <input type="file" name="picture_5" class="mb-1 form-control-file" placeholder="Picture 5" autocomplete="off"
                required>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
@endsection
