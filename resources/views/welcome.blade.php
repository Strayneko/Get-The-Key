@extends('templates.base')
@section('title', 'tes')
@section('content')

    

    <livewire:home.banner />
    <livewire:home.features />
    <livewire:home.categories />
    

    <!-- new arrival -->
    <livewire:home.newarival />
    <!-- ./new arrival -->

    
    <!-- product -->
    <livewire:home.products />
    <!-- ./product -->
    

@endsection