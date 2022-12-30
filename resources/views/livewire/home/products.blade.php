<div class="container pb-16">
        <div x-init="@this.on('addedToCart', () => {
            Swal.fire(
            'Success!',
            `Product has added to cart succesfully!`,
            'success'
            )
            })"></div>

    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">product list</h2>
    <div class="grid grid-cols-4 gap-6">
        @if(count($products) > 0)
        @foreach($products as $product)
        <div class="bg-white shadow rounded overflow-hidden group" wire:key="{{ 'product-' . $product->id }}">
            <div class="relative">
                <img src="{{ asset('storage/' . $product->image) }}" alt="product {{ $product->id }}" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="{{ route('home.product_detail', ['id' => $product->id]) }}"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
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
                    <div class="text-xs text-gray-500 ml-3">({{ count($product->license->where('status', '>', 0)) <= 0 ? 'Habis' : number_format(count($product->license->where('status', '>', 0))) }})</div>
                </div>
            </div>
            <button @if(count($product->license->where('status', '>', 0)) <= 0) disabled @endif wire:click.prevent="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                class="block w-full disabled:cursor-not-allowed py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary disabled:grayscale transition">Add
                to cart</button>
        </div>
        @endforeach
        @else
        <h1 class="text-gray-600 text-2xl">No product available</h1>
        @endif
    </div>
</div>