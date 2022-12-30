@extends('templates.base')
@section('title', 'Checkout')
@section('content')
<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">


        <livewire:home.checkout :transaction="$transaction" />
    

</div>


@endsection