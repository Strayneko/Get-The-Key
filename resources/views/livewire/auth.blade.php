@extends('templates.base')
@section('title', 'Login User')
@section('content')
<div x-data>
    <div x-data="{register: false, login: true}">
        <div x-show="login" x-transition>
            <livewire:auth.login wire:key="page-login" />
        </div>
        <div x-show="register" x-transition>
            <livewire:auth.register wire:key="page-register" x-show="register" />
        </div>
        </div>
</div>
@endsection