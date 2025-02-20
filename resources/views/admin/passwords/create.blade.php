@extends('layouts.admin')

@section('content')
<div class="form-container">
    <h1>Create a new password</h1>
    <form action="{{ route('admin.passwords.store') }}" method="POST">
        @csrf

        <section>
            {{-- name --}}
            <div class="form-input ">
                <input type="text" class="border" id="floatingInput" name="name">
                <label for="floatingInput">Name*</label>
            </div>
    
            {{-- username --}}
            <div class="form-input">
                <input type="text" class="border" id="floatingInput" name="username">
                <label for="floatingInput">Username*</label>
            </div>
    
            {{-- password --}}
            <div class="form-input">
                <input type="password" class="border" id="floatingPassword" name="password">
                <label for="floatingPassword">Password*</label>
            </div>
        </section>
        <section>
            {{-- password length --}}
            {{-- <div class="form-label mb-3 mt-3">
                        <label for="customRange2">Password length</label>
                        <input type="range" class="form-range" min="0" max="5" id="customRange2">
                    </div> --}}
    
            {{-- favourite --}}
            <div class="">
                <input checked="" class="check" type="checkbox" value="1" id="flexCheckDefault" name="favourite">
                <label class="" for="flexCheckDefault">
                    Add to favourites
                </label>
            </div>
    
            {{-- color picker --}}
            <div class="color-picker">
                <label for="exampleColorInput">Choose a color</label>
                <input type="color" id="exampleColorInput" value="#78be78"
                    title="Choose your color" name="color">
            </div>
            <button type="submit" class="border">Create</button>
        </section>

    </form>
</div>
@endsection
