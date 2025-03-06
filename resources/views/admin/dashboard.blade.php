@extends('layouts.admin')

@section('content')
    <script>
        //PASSWORD LENGTH
        let pswLength = 12;
        document.addEventListener('DOMContentLoaded', function() {

            const inputRange = document.getElementById('custom-range');
            const changeLength = document.querySelector('.password-length');

            inputRange.addEventListener('change', function() {
                pswLength = inputRange.value * 4;
                changeLength.innerHTML = pswLength;
            });
        })

        //PASSWORD GENERATOR
        function generatePassword(length) {
            const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            const lowercase = "abcdefghijklmnopqrstuvwxyz";
            const numbers = "0123456789";
            const symbols = "!@#$%^&*()_+[]{}|;:,.?";

            const allCharacters = uppercase + lowercase + numbers + symbols;
            let password = "";

            // Garantiamo che la password contenga almeno un carattere di ciascun tipo
            password += uppercase[Math.floor(Math.random() * uppercase.length)];
            password += lowercase[Math.floor(Math.random() * lowercase.length)];
            password += numbers[Math.floor(Math.random() * numbers.length)];
            password += symbols[Math.floor(Math.random() * symbols.length)];

            // Aggiungiamo i caratteri rimanenti in modo casuale
            for (let i = password.length; i < length; i++) {
                password += allCharacters[Math.floor(Math.random() * allCharacters.length)];
            }

            // Mischiamo i caratteri per rendere la password più imprevedibile
            password = password.split('').sort(() => Math.random() - 0.5).join('');

            const containerPassword = document.querySelector('#password');
            containerPassword.innerHTML = password;
        }

        //COPY PASSWORD
        function copy(elementId) {
            const text = document.getElementById(elementId).textContent; // Prendi il testo dall'elemento con ID 'password'
            const toastMessage = document.querySelector('.toast-message');

            // Usa l'API Clipboard per copiare il testo
            navigator.clipboard.writeText(text).then(() => {
                toastMessage.classList.remove('d-none');

                setTimeout(() => {
                    toastMessage.classList.add('d-none');
                }, 4000);
            }).catch(err => {
                console.error("Errore durante la copia della password: ", err);
            });
        }
    </script>

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
                    <button onclick="generatePassword(pswLength)" class="border" title="Generate Password"><i
                            class="fa-solid fa-repeat"></i></button>
                    <div id="password" class="border">
                    </div>
                    <button onclick="copy('password')" class="border" title="Copy"><i
                            class="fa-solid fa-copy"></i></button>
                </div>
            </div>
        </div>
        <div id="advise-psw">
            <h4>If you want to create a <strong>strong password</strong>, it is important to follow some basic guidelines</h4>
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
