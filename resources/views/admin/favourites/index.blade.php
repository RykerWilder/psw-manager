@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column gap-3 p-3">
                @foreach ($favouritesPassword as $favourite)
                    @if ($favourite->user_id === Auth::id() && $favourite->favourite === 1)
                        <div class="list-group">
                            <a id="password-card" href="{{ route('admin.passwords.show', ['password' => $favourite->id]) }}" class="border border-dark rounded p-3 d-block nav-link" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ ucfirst($favourite->name) }}</h5>
                                    <span><i class="fa-{{ $favourite->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                                </div>
                                <div style="background-color: {{ $favourite->color }}; height: 20px; aspect-ratio: 1;" class="rounded-circle p-2">
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
