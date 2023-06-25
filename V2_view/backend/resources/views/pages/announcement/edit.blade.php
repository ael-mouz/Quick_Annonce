@extends('layouts.app')
@section('content')
    <div class="row" id="register">
        <form action="{{ route('update_announcement', $announcement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <br>
            <div class="bar-banner">
                <img src="{{ asset('img/banner.svg') }}" alt="user">
                <div class="bar-banner-title">
                    <img src="{{ asset('img/lock.svg') }}" alt="user">
                    <span>Edite votre annonce</span>
                </div>
            </div>
            <input type="text" name="username" value="{{ $announcement->username }}" class="mb-1 mt-2 form-control"
                placeholder="Username" autocomplete="off" required>
            <input type="email" name="email" value="{{ $announcement->email }}" class="mb-1 form-control"
                placeholder="Email" autocomplete="off" required>
            <input type="text" name="phone" value="{{ $announcement->phone }}" class="mb-1 form-control"
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
            <input type="text" name="title" class="mb-1 form-control" value="{{ $announcement->title }}"
                placeholder="Title" autocomplete="off" required>
            <textarea name="description" class="mb-1 form-control" placeholder="Description" autocomplete="off" required>{{ $announcement->description }}</textarea>
            <input type="number" name="price" class="mb-1 form-control" value="{{ $announcement->price }}"
                placeholder="Price" autocomplete="off" required>
            <input type="file" name="picture_1" class="mb-1 form-control-file" value="{{ $announcement->picture_1 }}"
                placeholder="Picture 1" autocomplete="off" required>
            <input type="file" name="picture_2" class="mb-1 form-control-file" value="{{ $announcement->picture_2 }}"
                placeholder="Picture 2" autocomplete="off" required>
            <input type="file" name="picture_3" class="mb-1 form-control-file" value="{{ $announcement->picture_3 }}"
                placeholder="Picture 3" autocomplete="off" required>
            <input type="file" name="picture_4" class="mb-1 form-control-file" value="{{ $announcement->picture_4 }}"
                placeholder="Picture 4" autocomplete="off" required>
            <input type="file" name="picture_5" class="mb-1 form-control-file" value="{{ $announcement->picture_5 }}"
                placeholder="Picture 5" autocomplete="off" required>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
@endsection
