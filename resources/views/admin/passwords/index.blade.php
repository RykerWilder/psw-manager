@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif

    <div class="passwords-list-container">
        {{-- FILTERS --}}
        <div id="filter-container">
            <div class="select border">
                <span><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                <select name="filter_name" id="filter_name" onchange="filterByName()">
                    <option value="">Sort by</option>
                    {{-- Aggiungi solo le password dell'utente corrente --}}
                    @foreach ($passwords->unique('name') as $passwordInfo)
                        <option value="{{ $passwordInfo->name }}">{{ ucfirst($passwordInfo->name) }}</option>
                    @endforeach
                </select>
            </div>

            <nav class="border">
                <input id="search-bar" type="search" name="search" placeholder="Search password" aria-label="Search">
                <button type="submit" class="border"><i class="fa-solid fa-magnifying-glass"></i></button>
            </nav>
        </div>

        {{-- PASSWORDS LIST --}}
        <div class="passwords-list" id="password-list">
            @foreach ($passwords as $passwordInfo)
                <a id="password-card" href="{{ route('admin.passwords.show', ['password' => $passwordInfo->id]) }}"
                    class="border password-card" aria-current="true" data-name="{{ $passwordInfo->name }}">
                    <div class="password-info">
                        <div style="background-color: {{ $passwordInfo->color }};" class="tag">
                        </div>
                        <h5>{{ ucfirst($passwordInfo->name) }}</h5>
                        <span><i
                                class="fa-{{ $passwordInfo->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script>
        // Funzione che filtra i risultati in base al nome selezionato dal dropdown
        function filterByName() {
            var filterValue = document.getElementById('filter_name').value.toLowerCase();
            var passwordCards = document.querySelectorAll('.password-card');
            
            passwordCards.forEach(function(card) {
                var name = card.getAttribute('data-name').toLowerCase();
                if (filterValue === "" || name.includes(filterValue)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
@endsection
