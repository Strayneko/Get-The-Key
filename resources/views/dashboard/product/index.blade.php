@extends('templates.dashboard')
@section('content')
<div>

    @if(session()->has('success'))
        <div x-init="Swal.fire(
                    'Success!',
                    `{{ session()->get('success') }}`,
                    'success'
                    )">
        </div>
        @endif
    <main class="w-full flex-grow p-6" x-data="{show: false}">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Product List
        </p>
    <a href="{{ route('dashboard.product.create') }}"  class="mb-2 py-1 px-2 bg-primary inline-block rounded text-white hover:-translate-y-1 transition hover:bg-darkerPrimary">Add Product</a>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class=" py-3 px-4 uppercase font-semibold text-sm">#</th>
                        <th class="w-10 h-10 py-3 px-4 uppercase font-semibold text-sm">Image</th>
                        <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Price</th>
                        <th class=" py-3 px-4 uppercase font-semibold text-sm">Stock</th>
                        <th class=" py-3 px-4 uppercase font-semibold text-sm">Option</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                  @foreach($products as $product)
                  <tr wire:key="{{ 'product-' . $product->id }}" class="text-center">
                        <td class="w-1/7  py-3 px-4 text-center">{{ $loop->iteration }}</td>
                        <td class="w-10 h-10  py-3 px-4"><img src="{{ asset('storage/' . $product->image) }}" alt=""></td>
                        <td class="w-1/3  py-3 px-4">{{ $product->name }}</td>
                        <td class=" py-3 px-4">{{ number_format($product->price) }}</td>
                        <td class=" py-3 px-4">{{ number_format($product->stock) }}</td>
                        <td class=" py-3 px-4">
                            <a href="#" wire:click.prevent="$emit('delete', {{ $product->id }})" class="text-white bg-red-500 inline-block py-1 px-2 rounded hover:bg-red-700 focus:bg-red-700 hover:-translate-y-1 transition-transform hover:shadow-lg">Delete</a>
                            <livewire:subcomponents.buttons.warning :text="'Edit'" :link="route('dashboard.product.edit', ['product_id' => $product->id])" />
                        </td>
                    </tr>
                  @endforeach

                </tbody>
            </table>
        </div>
    </div>


</main>
</div>
@endsection