
<div >
    <div class="mt-4">
        <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
        <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
            @if(count($product->license->where('status', '>', 0)) > 0 && $total > 0)
            <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none" wire:click="minCart()" wire:loading.remove>-</div>
            @endif
            <div class="hidden" wire:loading.class.remove="hidden">Loading...</div>
            <div class="h-8 w-8 text-base flex items-center justify-center" wire:loading.remove>{{ $total }}</div>
            @if(count($product->license->where('status', '>', 0)) > 0)
            @if($total < count($product->license->where('status', '>', 0)) )
            <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
                wire:click="addToCart()" wire:loading.remove>+</div>
                @endif
            @endif
        </div>
    </div>
    
    <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
        <button wire:loading.attr="disabled" @if(count($product->license->where('status', '>', 0)) <= 0 || $total >= count($product->license->where('status', '>', 0))) disabled @endif
                class="disabled:grayscale disabled:cursor-not-allowed bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition" wire:click.prevent="addToCart()">
                <i class="fa-solid fa-bag-shopping"></i> Add to cart
        </button>
        <a href="{{ route('home.index') }}"
            class="bg-green-500 border border-green-500 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-green-500 transition">
            Back
        </a>
    </div>
</div>