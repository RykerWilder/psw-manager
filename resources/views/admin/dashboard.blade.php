@extends('layouts.admin')

@section('content')
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>

    <div class="container-dashboard">
        {{-- WELCOME CARD --}}
        <div class="border welcome-card">
            <h1 class="border">{{ __('iLock') }}</h1>
            <div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Welcome back <strong>{{ ucfirst($user->name) }}</strong>!
            </div>
        </div>

        {{-- PASSWORD GENERATOR --}}
        <div class="psw-generator border">
            <h5 class="">Here you can generate your safety passwords!</h5>
            <div class="">
                <div class="psw-length border">
                    <label for="custom-range" class="form-label">Choose your password
                        length: <strong class="password-length">12</strong></label>
                    <input type="range" class="form-range" min="2" max="5" id="custom-range" value="3">
                </div>
                <div class="manage-psw">
                    <button onclick="generatePassword(pswLength)" class="border" title="Generate Password"><i
                            class="fa-solid fa-repeat"></i></button>
                    <div id="password" class="border">
                    </div>
                    <button onclick="copy('password')" class="border" title="Copy"><i
                            class="fa-solid fa-copy"></i></button>
                </div>
            </div>
        </div>

        {{-- TOAST MESSAGE --}}
        <div class="toast-message border d-none">
            <div class="toast-header">
                <h3>iLock</h3>
                <span>now</span>
            </div>
            <h6>Password copied successfully!</h6>
        </div>
    </div>
@endsection
