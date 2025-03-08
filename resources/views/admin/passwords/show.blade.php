@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="show-password">
        <div>
            <h1>{{ $password->name }}</h1>

            <div class="edit">
                {{-- EDIT BUTTON --}}
                <a href="{{ route('admin.passwords.edit', ['password' => $password->id]) }}" class="border"
                    title="Edit Password"><i class="fa-solid fa-pen"></i></a>
                {{-- DELETE BUTTON --}}
                <button type="submit" class="border ms-openModalDelete" title="Delete password"><i
                        class="fa-solid fa-trash-can "></i></button>
            </div>
        </div>
        <div>
            <h5>Username</h5>
            <h3>
                <button><i class="fa-solid fa-copy"></i></button>
                <span id="username">
                    {{ $password->username }}
                </span>
            </h3>
            <h5>Password</h5>
            <h3>
                <button id="copyPswShow" title="Copy password"><i class="fa-solid fa-copy"></i></button>
                <button class="eye" title="Show password">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <button class="hidden-eye d-none" title="Hide password">
                    <i class="fa-solid fa-eye-slash"></i>
                </button>
                <span class="d-none" id="passwordShow">{{ $decryptPsw }}</span>
                <span class="hidden-psw">----------</span>
            </h3>
            <h5>Created: {{ $password->created_at->format('d/m/Y') }} </h5>
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
    {{-- TOAST MESSAGE --}}

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
    {{-- DELETE MODAL --}}
@endsection
