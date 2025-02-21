@extends('layouts.admin')

@section('content')
    <script>
        const $one = document.querySelector.bind(document);
        const $all = document.querySelectorAll.bind(document);

        document.addEventListener('DOMContentLoaded', function() {

            // MODAL DELETE
            const openModalDelete = $one('.ms-openModalDelete');
            const closeModalDelete = $one('.ms-closeModalDelete');

            openModalDelete.addEventListener('click', function() {

                //console.log('open modal');

                const modalDelete = $one('.modal-delete');
                modalDelete.classList.remove('d-none');
                // modalDelete.classList.add('bg-secondary');
                modalDelete.classList.add('ms-modal'); //custom class per il modale e l'effetto ease-in 

                const container = $one('.ms-container-index');
                container.classList.add('opacity');
            });


            closeModalDelete.addEventListener('click', function() {

                //console.log('close modal');

                const modalDelete = $one('.modal-delete');
                modalDelete.classList.add('d-none');

                const container = $one('.show-password');
                container.classList.remove('opacity-25');
            });
            // MODAL DELETE

            // SHOW PASSWORD
            const eye = $one('.eye');
            const hiddenEye = $one('.hidden-eye');
            const password = $one('.password');
            const hiddenPsw = $one('.hidden-psw');

            eye.addEventListener('click', function() {
                hiddenPsw.classList.add('d-none');
                eye.classList.add('d-none');
                hiddenEye.classList.remove('d-none');
                password.classList.remove('d-none');
            });

            hiddenEye.addEventListener('click', function() {
                hiddenPsw.classList.remove('d-none');
                password.classList.add('d-none');
                hiddenEye.classList.add('d-none');
                eye.classList.remove('d-none');
            });
            // SHOW PASSWORD
        });
    </script>

    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="show-password">
        <div class="">
            <h1>{{ $password->name }}</h1>
            <div class="edit">
                {{-- EDIT BUTTON --}}
                <a href="{{ route('admin.passwords.edit', ['password' => $password->id]) }}" class="border"><i
                        class="fa-solid fa-pen"></i></a>
                {{-- DELETE BUTTON --}}
                <button type="submit" class="border ms-openModalDelete" title="Delete"><i
                        class="fa-solid fa-trash-can "></i></button>
            </div>
        </div>
        <div>
            <h5>Username</h5>
            <h3>{{ $password->username }}</h3>
            <h5>Password</h5>
            <h3>
                <button class="eye">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <button class="hidden-eye d-none">
                    <i class="fa-solid fa-eye-slash"></i>
                </button>
                <span class="d-none password">{{ $decryptPsw }}</span>
                <span class="hidden-psw">----------</span>
            </h3>
            <h5>Created: {{ $password->created_at->format('d/m/Y') }} </h5>
        </div>
    </div>
    {{-- DELETE MODAL --}}
    <div class="modal-delete d-none border">
        <div class="">
            <h3 class="">Are you sure to delete this password?</h3>
            <h6>This action is irreversible.</h6>
        </div>
        <div class="edit">
            <form class="" action="{{ route('admin.passwords.destroy', $password->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="border">Delete</button>
            </form>
            <button class="ms-closeModalDelete border">Undo</button>
        </div>
    </div>
@endsection
