@extends('templates.base')
@section('title', 'Transaction Detail')
@section('content')

<livewire:home.transaction.detail :transaction="$transaction" />

@endsection