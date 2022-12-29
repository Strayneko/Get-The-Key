@extends('templates.dashboard')
@section('content')
<div x-data="{page: 'index'}">
    <template x-if="$store.page.page == 'product'">
        <livewire:dashboard.product.index />
    </template>
    <template x-if="$store.page.page == 'category'">
        <livewire:dashboard.category.index />
    </template>
</div>
@endsection