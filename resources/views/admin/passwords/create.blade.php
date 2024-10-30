@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            

            <form action="{{ route('admin.passwords.store') }}" method="POST">
                @csrf

                {{-- name --}}
                <div class="form-floating mb-3 mt-5">
                    <input type="text" class="form-control" id="floatingInput" name="name">
                    <label for="floatingInput">Name*</label>
                </div>

                {{-- username --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username">
                    <label for="floatingInput">Username*</label>
                </div>
    
                {{-- password length --}}
                {{-- <div class="form-label mb-3 mt-3">
                    <label for="customRange2">Password length</label>
                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                </div> --}}
    
                {{-- password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password">
                    <label for="floatingPassword">Password*</label>
                </div>
    
                {{-- favourite --}}
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="favourite">
                    <label class="form-check-label" for="flexCheckDefault">
                        Add to favourites
                    </label>
                </div>
    
                {{-- color picker --}}
                <div class="mb-3">
                    <label for="exampleColorInput" class="form-label">Choose a color</label>
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c"
                        title="Choose your color" name="color">
                </div>

                <button id="button" type="submit" class="btn border border-dark mt-4">Create</button>
            </form>

        </div>
    </div>
@endsection
