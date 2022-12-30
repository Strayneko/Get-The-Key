@extends('templates.base')
@section('title', 'Transaction list')
@section('content')
<div class="bg-white p-6  md:mx-auto">
    <h1 class="text-slate-700 text-2xl font-semibold mb-3">Transaction history</h1>
    <livewire:home.transaction-table />
</div>
@endsection