@extends('templates.base')
@section('title', 'Auth User')
@section('content')
<div x-data>
    <div x-data="{register: false, login: true}">
        {{-- get success message --}}
        @if(session()->has('success'))
        {{-- show sweetalert --}}
            <div x-init="
                 Swal.fire({
                icon: 'success',
                title: 'Success!',
                 html: `{{ session()->get('success') }}`
                 })"></div>
        @endif

        
        {{-- check if there is any errors send --}}
        @if($errors->any())
        {{-- initialize message variable --}}
        @php($message = '')
        {{-- loop trhough error messages --}}
        @foreach($errors->all() as $error)
        @if($error != 'register' && $error != 'login')
        {{-- append every error to $message variable --}}
        @php($message .= "$error <br />")
            @endif
            @endforeach
            {{-- show sweetalert --}}
            <div x-init="
            Swal.fire({
            icon: 'error',
            title: 'Error!',
            html: `{{ $message }}`
        })
        "></div>
        @if($errors->get('type')[0] == 'register')
        {{-- set auth page to register --}}
        <div x-init="register = true, login = false"></div>
        @else
        {{-- set auth page to login --}}
        <div x-init="register = false, login = true"></div>
        @endif
        @endif

        <div x-show="login" x-transition>
            <livewire:auth.login wire:key="page-login" />
        </div>
        <div x-show="register" x-transition>
            <livewire:auth.register wire:key="page-register" x-show="register" />
        </div>
    </div>
</div>
@endsection