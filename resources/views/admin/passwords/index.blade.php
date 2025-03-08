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
                <select name="" id="">
                    <option value="">Sort by</option>
                    <option value="">Pippo</option>
                    <option value="">Jonny</option>
                </select>
            </div>
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
                        class="border" aria-current="true">
                        <div class="password-info">
                            <div style="background-color: {{ $passwordInfo->color }};" class="tag">
                            </div>
                            <h5>{{ ucfirst($passwordInfo->name) }}</h5>
                            <span><i
                                    class="fa-{{ $passwordInfo->favourite === 1 ? 'solid' : 'regular' }} fa-star text-warning fs-5"></i>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
