@extends('templates.base')
@section('title', 'Home')
@section('content')

    

    <livewire:home.banner />
    <livewire:home.features />
    <livewire:home.categories />
    


    
    <!-- product -->
    <livewire:home.products />
    <!-- ./product -->
    

@endsection