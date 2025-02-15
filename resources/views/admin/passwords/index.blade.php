@extends('layouts.admin')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchBar = document.getElementById('search-bar');
            const passwordCards = document.querySelectorAll('#password-card');

            // Aggiungi un event listener per rilevare i cambiamenti nella barra di ricerca
            searchBar.addEventListener('keyup', function() {

                const searchTerm = searchBar.value.toLowerCase();

                // Loop attraverso gli elementi della lista e nascondi quelli che non corrispondono
                passwordCards.forEach(card => {
                    const passwordName = card.querySelector('h5').textContent.toLowerCase();

                    // Mostra o nasconde l'elemento basato sulla corrispondenza con il termine di ricerca
                    if (passwordName.includes(searchTerm)) {
                        card.classList.remove('d-none');
                    } else {
                        card.classList.add('d-none');
                    }
                });
            });
        });
    </script>

    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="passwords-list-container">
        {{-- SEARCHBAR --}}
        <div class="searchbar">
            <nav class="border">
                <input id="search-bar" type="search" placeholder="Search password" aria-label="Search" class="">
                <span class="border"><i class="fa-solid fa-magnifying-glass"></i></span>
            </nav>
        </div>


        {{-- PASSWORDS LIST --}}
        <div class="passwords-list">
            @foreach ($passwords as $passwordInfo)
                @if ($passwordInfo->user_id === Auth::id())
                    <a id="password-card" href="{{ route('admin.passwords.show', ['password' => $passwordInfo->id]) }}"
                        class="border border-dark rounded p-3 d-block nav-link" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ ucfirst($passwordInfo->name) }}</h5>
                            <span><i
                                    class="fa-{{ $passwordInfo->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                        </div>
                        <div style="background-color: {{ $passwordInfo->color }}; height: 20px; aspect-ratio: 1;"
                            class="rounded-circle p-2">
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
