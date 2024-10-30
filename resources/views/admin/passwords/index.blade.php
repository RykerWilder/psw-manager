@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column gap-3 p-3">
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid d-flex justify-content-center">
                        <form class="d-flex gap-2" role="search">
                            <input class="form-control" type="search" placeholder="Search password" aria-label="Search">
                            <button id="button" class="btn fs-5 border border-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </nav>
                @foreach ($passwords as $passwordInfo)
                    @if ($passwordInfo->user_id === Auth::id())
                        <a id="password-card" href="{{ route('admin.passwords.show', ['password' => $passwordInfo->id]) }}"
                            class="border border-dark rounded p-3 d-block nav-link" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ ucfirst($passwordInfo->name) }}</h5>
                                <span><i
                                        class="fa-{{ $passwordInfo->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                            </div>
                            <div style="background-color: {{ $passwordInfo->color }}; height: 20px; aspect-ratio: 1;" class="rounded-circle p-2">
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
