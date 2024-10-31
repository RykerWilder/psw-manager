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
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column gap-3 p-3">

                {{-- SEARCHBAR --}}
                <div class="container-fluid text-center mt-3 mb-3">
                    <nav class="border border-dark rounded p-3 d-inline bg-black">
                        <input id="search-bar" type="search" placeholder="Search password" aria-label="Search" class="border border-0 bg-black text-light">
                        <span><i class="fa-solid fa-magnifying-glass text-light fs-5"></i></span>
                    </nav>
                </div>

                {{-- FAVOURITES LIST --}}
                @foreach ($favouritesPassword as $favourite)
                    @if ($favourite->user_id === Auth::id() && $favourite->favourite === 1)
                        <div class="list-group">
                            <a id="password-card" href="{{ route('admin.passwords.show', ['password' => $favourite->id]) }}"
                                class="border border-dark rounded p-3 d-block nav-link" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ ucfirst($favourite->name) }}</h5>
                                    <span><i
                                            class="fa-{{ $favourite->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                                </div>
                                <div style="background-color: {{ $favourite->color }}; height: 20px; aspect-ratio: 1;"
                                    class="rounded-circle p-2">
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
