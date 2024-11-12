@extends('layouts.admin')

@section('content')
    <script>
        //PASSWORD LENGTH

        let pswLength = 12;
        document.addEventListener('DOMContentLoaded', function() {
            const inputRange = document.getElementById('custom-range');

            inputRange.addEventListener('change', function() {
                pswLength = inputRange.value * 4;
                console.log(pswLength);
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">

                {{-- WELCOME CARD --}}
                <div class="border border-dark rounded p-3">
                    <div class="border-bottom border-dark">
                        <h3>{{ __('iLock') }}</h3>
                    </div>

                    <div class="p-2 fs-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Welcome back <strong>{{ ucfirst($user->name) }}</strong>!
                    </div>
                </div>

                {{-- PASSWORD GENERATOR --}}
                <div>
                    <h5 class="mb-3 mt-5 text-center">Here you can generate your safety password.</h5>
                    <div class="gap-2 border border-dark p-3 rounded">

                        <div class="border border-dark rounded p-3">
                            <label for="custom-range" class="form-label">Choose your password
                                length</label>
                            <input type="range" class="form-range" min="2" max="5" id="custom-range" value="3">
                        </div>

                        <div class="d-flex justify-content-between gap-2 p-3">
                            <button onclick="generatePassword(pswLength)"
                                class="btn fs-4 border border-dark ms-button" title="Generate Password"><i
                                    class="fa-solid fa-repeat"></i></button>
                            <div id="password" class="rounded border border-dark w-100 text-center">
                            </div>
                            <button onclick="copy('password')" class="btn fs-4 border border-dark ms-button"
                                title="Copy"><i class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>
                </div>

                {{-- TOAST MESSAGE --}}
                <div id="toast-message" class="container position-absolute p-3 border border-dark rounded d-none"
                    style="width: 300px; bottom: 20px; right: 20px">
                    <div id="liveToast" class="row" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="col">
                            <div class="toast-header">
                                <strong class="me-auto">iLock</strong>
                                <small>now</small>
                            </div>
                            <div class="toast-body">
                                Password Copied Successfully!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
