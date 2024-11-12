@extends('layouts.admin')

@section('content')
    <script>
        const $one = document.querySelector.bind(document);
        const $all = document.querySelectorAll.bind(document);

        document.addEventListener('DOMContentLoaded', function() {

            const openModalDelete = $one('.ms-openModalDelete');
            const closeModalDelete = $one('.ms-closeModalDelete');

            openModalDelete.addEventListener('click', function() {

                console.log('open modal');

                const modalDelete = $one('.ms-modal-delete');
                modalDelete.classList.remove('d-none');
                // modalDelete.classList.add('bg-secondary');
                modalDelete.classList.add('ms-modal'); //custom class per il modale e l'effetto ease-in 

                const container = $one('.ms-container-index');
                container.classList.add('opacity-25');
            });


            closeModalDelete.addEventListener('click', function() {

                console.log('close modal');

                const modalDelete = $one('.ms-modal-delete');
                modalDelete.classList.add('d-none');

                const container = $one('.ms-container-index');
                container.classList.remove('opacity-25');
            });
        });
    </script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <h1>{{ $password->name }}</h1>
                <div class="d-flex gap-3 mb-5">

                    {{-- EDIT BUTTON --}}
                    <a href="{{ route('admin.passwords.edit', ['password' => $password->id]) }}"
                        class="btn fs-4 border border-dark ms-button"><i class="fa-solid fa-pen"></i></a>

                    {{-- DELETE BUTTON --}}
                    <button type="submit" class="ms-openModalDelete btn fs-4 border border-dark ms-button" title="Delete"><i
                            class="fa-solid fa-trash-can "></i></button>
                </div>
                <div>
                    <h4>Username: {{ $password->username }} </h4>
                    <h4>Password: {{ $password->password }}</h4>
                    <h5>Tag: {{ $password->color }}</h5>
                    <h5>Created: {{ $password->created_at }} </h5>
                </div>

                {{-- DELETE MODAL --}}
                <div
                    class="ms-modal-delete position-absolute start-50 translate-middle-x border border-dark rounded p-3 d-none">
                    <div class="d-flex flex-column justify-content-space-between">
                        <h3 class="mb-5">Are you sure to delete this password?</h3>
                        <h6>This action is irreversible.</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <form class="d-flex align-center justify-content-end"
                            action="{{ route('admin.passwords.destroy', $password->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button class="ms-closeModalDelete btn border border-dark ms-button">Undo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
