// PASSWORD LENGTH
let passwordLength = 12;
document.addEventListener('DOMContentLoaded', function () {
    const inputRange = document.getElementById('custom-range');
    const changeLength = document.querySelector('.password-length');

    // Aggiorna la lunghezza della password quando l'input cambia
    inputRange.addEventListener('change', function () {
        passwordLength = inputRange.value * 4; // Aggiorna la variabile globale
        changeLength.innerHTML = passwordLength; // Aggiorna la visualizzazione
    });
});


// PASSWORD GENERATOR
const btnPswGenerator = document.getElementById('pswGnerator');
btnPswGenerator.addEventListener('click', function () {
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
    for (let i = password.length; i < passwordLength; i++) {
        password += allCharacters[Math.floor(Math.random() * allCharacters.length)];
    }

    // Mischiamo i caratteri per rendere la password più imprevedibile
    password = password.split('').sort(() => Math.random() - 0.5).join('');

    const containerPassword = document.querySelector('#password');
    containerPassword.innerHTML = password;
});


//COPY PASSWORD
const btnCopyPsw = document.getElementById('copyPsw');
btnCopyPsw.addEventListener('click', function() {
    const text = document.getElementById('password').textContent;
     // Prendi il testo dall'elemento con ID 'password'
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
});