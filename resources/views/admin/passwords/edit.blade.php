@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <form action="{{ route('admin.passwords.update', ['password' => $password->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <section>
                {{-- name --}}
                <div class="form-input">
                    <input type="text" class="form-control" id="floatingInput" name="name" value="{{ $password->name }}">
                    <label for="floatingInput">Name*</label>
                </div>
    
                {{-- username --}}
                <div class="form-input">
                    <input type="text" class="form-control" id="floatingInput" name="username"
                        value="{{ $password->username }}">
                    <label for="floatingInput">Username*</label>
                </div>
    
                {{-- password --}}
                <div class="form-input">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        value="{{ $decryptPsw }}">
                    <label for="floatingPassword">Password*</label>
                </div>
            </section>

            <section>

                {{-- favourite --}}
                <div class="">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="favourite"
                        @checked($password->favourite)>
                    <label class="form-check-label" for="flexCheckDefault">
                        Add to favourites
                    </label>
                </div>
    
                {{-- color picker --}}
                <div class="color-picker">
                    <label for="exampleColorInput" class="form-label">Choose a color</label>
                    <input type="color" class="form-control form-control-color" id="exampleColorInput"
                        value="{{ $password->color }}" title="Choose your color" name="color">
                </div>
    
                <button type="submit" class="border">Edit</button>
            </section>
        </form>
    </div>
@endsection
