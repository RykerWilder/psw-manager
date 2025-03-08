const $one = document.querySelector.bind(document);
const $all = document.querySelectorAll.bind(document);

document.addEventListener('DOMContentLoaded', function () {

    // MODAL DELETE
    const openModalDelete = $one('.ms-openModalDelete');
    const closeModalDelete = $one('.ms-closeModalDelete');

    openModalDelete.addEventListener('click', function () {
        const modalDelete = $one('.modal-delete');
        modalDelete.classList.remove('d-none');
        modalDelete.classList.add('ms-modal'); //custom class per il modale e l'effetto ease-in 
        const container = $one('.ms-container-index');
        container.classList.add('opacity');
    });


    closeModalDelete.addEventListener('click', function () {
        const modalDelete = $one('.modal-delete');
        modalDelete.classList.add('d-none');
        const container = $one('.show-password');
        container.classList.remove('opacity-25');
    });
    // MODAL DELETE

    // SHOW PASSWORD
    const eye = $one('.eye');
    const hiddenEye = $one('.hidden-eye');
    const password = $one('#passwordShow');
    const hiddenPsw = $one('.hidden-psw');

    eye.addEventListener('click', function () {
        hiddenPsw.classList.add('d-none');
        eye.classList.add('d-none');
        hiddenEye.classList.remove('d-none');
        password.classList.remove('d-none');
    });

    hiddenEye.addEventListener('click', function () {
        hiddenPsw.classList.remove('d-none');
        password.classList.add('d-none');
        hiddenEye.classList.add('d-none');
        eye.classList.remove('d-none');
    });
    // SHOW PASSWORD
});

//COPY PASSWORD
const btnCopyPsw = document.getElementById('copyPswShow');
btnCopyPsw.addEventListener('click', function() {
    const text = document.getElementById('passwordShow').textContent;
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