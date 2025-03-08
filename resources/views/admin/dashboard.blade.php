@extends('layouts.admin')

@section('content')
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
                <h4>Welcome back <strong>{{ ucfirst($user->name) }}</strong>!</h4>
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
                    <button id="pswGnerator" class="border" title="Generate Password"><i
                            class="fa-solid fa-repeat"></i></button>
                    <div id="password" class="border">
                    </div>
                    <button onclick="copy('password')" class="border" title="Copy"><i
                            class="fa-solid fa-copy"></i></button>
                </div>
            </div>
        </div>
        <div id="advise-psw">
            <h4>Tips for a strong password</h4>
            <ul>
                <li class="border"><strong>Length</strong>Use at least 12-16 characters. The longer the password, the greater the security.
                </li>
                <li class="border"><strong>Complexity</strong>Include a combination of uppercase letters, lowercase letters, numbers, and
                    special
                    characters (e.g. !, @, #, $, %, etc.).</li>
                <li class="border"><strong>Variety</strong>Avoid common sequences (e.g. "123456" or "qwerty") or commonly used words (e.g.
                    "password" or
                    "admin").</li>
                <li class="border"><strong>Uniqueness</strong>Do not reuse the same password for multiple accounts or services.</li>
                <li class="border"><strong>No personal information</strong>Avoid including names, dates of birth, phone numbers or other
                    information that
                    can easily be associated with you.</li>
                <li class="border"><strong>Regularly update</strong>Change your password regularly, especially for sensitive accounts.</li>
                <li class="border"><strong>Using complex sentences</strong>Consider using a passphrase, which is a series of random words
                    strung together
                    (e.g. "Sky!Sea@Mountain2023").
                </li>
            </ul>
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
