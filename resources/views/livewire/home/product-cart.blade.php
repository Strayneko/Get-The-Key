<div>
    @if(session()->has('success'))
    <livewire:subcomponents.alert.success :message="session()->get('success')" />
    @endif
    @if(count($user_carts) > 0)
    @foreach($user_carts as $user_cart)
<div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
    <div class="flex w-2/5">
        <!-- product -->
        <div class="w-20">
            <img class="h-24" src="{{ asset('storage/'. $user_cart->product->image) }}" alt="">
        </div>
        <div class="flex flex-col justify-between ml-4 flex-grow" >
            <span class="font-bold text-sm">{{ $user_cart->product->name }}</span>
            <span class="text-red-500 text-xs">{{ $user_cart->product->manufacture }}</span>
            <a href="#" wire:click.prevent="removeCartItem({{ $user_cart->product->id }})" class="font-semibold hover:text-red-500 text-gray-500 text-xs focus:bg-red-300 w-fit px-2 py1 rounded">Remove</a>
        </div>
    </div>


    <div class="flex justify-center w-1/5" >
        <div class="flex items-center" wire:loading.remove>
            <svg class="fill-current text-gray-600 w-3 cursor-pointer" viewBox="0 0 448 512"
                wire:click="minCartQuantity({{ $user_cart->product->id }})">
                <path
                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
            </svg>
        </div>

        <span  wire:loading.class.remove="hidden" class="hidden">Loading...</span>
        <div wire:loading.remove>
        <input class="mx-2 border text-center w-8"
            wire:change="setCartQuantity($event.target.value, {{ $user_cart->product->id }})" type="text"
            value="{{ $user_cart->quantity }}">
        </div>

        <div class="flex items-center" wire:loading.remove>
            <svg class="fill-current text-gray-600 w-3 cursor-pointer" wire:click="addCartQuantity({{ $user_cart->product->id }})"
                viewBox="0 0 448 512">
                <path
                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
            </svg>
        </div>
    </div>
    <span class="text-center w-1/5 font-semibold text-sm">Rp{{ number_format($user_cart->product->price) }}</span>
    <span class="text-center w-1/5 font-semibold text-sm">Rp{{ number_format($user_cart->quantity * $user_cart->product->price) }}</span>
</div>
@endforeach
@else
<h1 class="text-gray-800 text-center text-semibold text-xl">No product available in your cart</h1>
@endif

</div>