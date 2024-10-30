@extends('layouts.admin')

@section('content')
    <script>
        //PASSWORD GENERATOR
        function generatePassword(length = 12) {
            const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            const lowercase = "abcdefghijklmnopqrstuvwxyz";
            const numbers = "0123456789";
            const symbols = "!@#$%^&*()_+[]{}|;:,.<>?";

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

            console.log('ciao');
            const containerPassword = document.querySelector('#password');
            containerPassword.innerHTML = password;
            return password;
        }

        function copy(id) {
            const input = document.createElement('input'); // Crea un nuovo elemento <input> temporaneo
            const area = document.getElementById(id).value; // Ottiene il valore dell'elemento con l'id passato
            input.setAttribute('value', area); // Imposta il valore dell'input temporaneo con il testo da copiare
            document.body.appendChild(input); // Aggiunge l'input temporaneo al DOM (necessario per copiare il contenuto)
            input.select(); // Seleziona il contenuto dell'input temporaneo
            const risultato = document.execCommand('copy'); // Esegue il comando di copia
            document.body.removeChild(input); // Rimuove l'input temporaneo dal DOM
            return risultato; // Restituisce il risultato del comando di copia (true se ha avuto successo)
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
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

                        Welcome back <strong> {{ ucfirst($user->name) }}</strong>!
                    </div>
                </div>

                <div>
                    <h5 class="mb-3 mt-5 text-center">Here you can generate your safety password.</h5>
                    <div class="gap-2 border border-dark p-3 rounded">
                        <label for="customRange2" class="form-label">Choose length of your password</label>
                        <input type="range" class="form-range" min="0" max="3" id="customRange2">

                        <div class="d-flex justify-content-between gap-2 p-3">
                            <button id="button" onclick="generatePassword()" class="btn fs-4 border border-dark"
                                title="Generate Password"><i class="fa-solid fa-repeat"></i></button>
                            <div id="password" class="rounded border border-dark w-100 text-center">
                            </div>
                            <button id="button" onclick="copy('password')" class="btn fs-4 border border-dark"
                                title="Copy"><i class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
