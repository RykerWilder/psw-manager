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
            const toastMessage = document.getElementById('toast-message');

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
            <div class="">
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
        <div id="toast-message" class="border d-none">
            <div class="toast-header"><h3>iLock</h3><span>now</span></div>
            <h6>Password copied successfully!</h6>
        </div>
    </div>
@endsection
