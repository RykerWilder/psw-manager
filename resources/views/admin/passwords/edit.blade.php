@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <form action="{{ route('admin.passwords.update', ['password' => $password->id]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- name --}}
            <div class="form-floating mb-3 mt-5">
                <input type="text" class="form-control" id="floatingInput" name="name" value="{{ $password->name }}">
                <label for="floatingInput">Name*</label>
            </div>

            {{-- username --}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" value="{{ $password->username }}">
                <label for="floatingInput">Username*</label>
            </div>

            {{-- password --}}
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" value="{{ $decryptPsw }}">
                <label for="floatingPassword">Password*</label>
            </div>

            {{-- favourite --}}
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="favourite" @checked($password->favourite)>
                <label class="form-check-label" for="flexCheckDefault">
                    Add to favourites
                </label>
            </div>

            {{-- color picker --}}
            <div class="mb-3">
                <label for="exampleColorInput" class="form-label">Choose a color</label>
                <input type="color" class="form-control form-control-color" id="exampleColorInput" value="{{ $password->color }}"
                    title="Choose your color" name="color">
            </div>

            <button type="submit" class="btn border border-dark mt-4 ms-button">Edit</button>
        </form>

    </div>
</div>
@endsection
