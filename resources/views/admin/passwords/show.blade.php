@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">    
                <h1>{{ $password->name }}</h1>
            </div>
        </div>
    </div>
@endsection
