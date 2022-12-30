@extends('templates.base')
@section('title', 'Detail')
@section('content')

<!-- breadcrumb -->
<div class="container py-4 flex items-center gap-3">
    <a href="../index.html" class="text-primary text-base">
        <i class="fa-solid fa-house"></i>
    </a>
    <span class="text-sm text-gray-400">
        <i class="fa-solid fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Product</p>
</div>
<!-- ./breadcrumb -->

<!-- product-detail -->
<div class="container grid grid-cols-2 gap-6">
    <div class="w-[420px] h-[546px] mx-auto">
        <img src="{{ asset('storage/' . $product->image) }}" alt="product" class=" object-fit">

    </div>

    <div>
        <h2 class="text-3xl font-medium uppercase mb-2">{{ $product->name }}</h2>
        <div class="space-y-2">
            <p class="text-gray-800 font-semibold space-x-2">
                <span>Stock: </span>
                @if(count($license) > 0)
                <span class="text-green-600">{{ number_format(count($license)) }}</span>
                @else
                <span class="text-red-600">Out of stock</span>
                @endif
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Brand: </span>
                <span class="text-gray-600">{{ $product->manufacture }}</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Category: </span>
                <span class="text-gray-600">{{ $product->category->name }}</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Licensing Term: </span>
                <span class="text-gray-600">{{ $product->licensing_term }} Days</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Max User: </span>
                <span class="text-gray-600">{{ $product->max_user }} Users</span>
            </p>
        </div>
        <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
            <p class="text-xl text-primary font-semibold">Rp{{ number_format($product->price) }}</p>
        </div>

        <p class="mt-4 text-gray-600">{{ $product->description }}.</p>

        <div class="pt-4">

        </div>

        <livewire:home.product.detail-product-cart :product="$product" />

    </div>
</div>
<!-- ./product-detail -->



@endsection