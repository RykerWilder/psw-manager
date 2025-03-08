@extends('layouts.admin')

@section('content')
    <script>
        
    </script>
    <div class="favourites-list-container">
        {{-- SEARCHBAR --}}
        <div class="searchbar">
            <nav class="border">
                <input id="search-bar" type="search" placeholder="Search password" aria-label="Search" class="">
                <span class="border"><i class="fa-solid fa-magnifying-glass"></i></span>
            </nav>
        </div>

        {{-- FAVOURITES LIST --}}
        <div class="favourites-list">
            @foreach ($favouritesPassword as $favourite)
                @if ($favourite->user_id === Auth::id() && $favourite->favourite === 1)
                    <a id="favourite-card" href="{{ route('admin.passwords.show', ['password' => $favourite->id]) }}"
                        class="border" aria-current="true">
                        <div class="password-info">
                            <div style="background-color: {{ $favourite->color }};" class="tag">
                            </div>
                            <h5>{{ ucfirst($favourite->name) }}</h5>
                            <span><i
                                    class="fa-{{ $favourite->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
