<div class="container pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">product list</h2>
    <div class="grid grid-cols-4 gap-6">
        @if(count($products) > 0)
        @foreach($products as $product)
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="{{ asset('storage/' . $product->image) }}" alt="product {{ $product->id }}" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->name}}</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">Rp{{ number_format($product->price) }}</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-gray-800">
                        Stock
                    </div>
                    <div class="text-xs text-gray-500 ml-3">({{ number_format($product->stock) }})</div>
                </div>
            </div>
            <a href="#" wire:click="addToCart({{ $product->id }})"
                class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        @endforeach
        @else
        <h1 class="text-gray-600 text-2xl">No product available</h1>
        @endif
    </div>
</div>