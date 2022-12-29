<?php

namespace App\Http\Livewire\Home;

use App\Models\Cart;
use App\Models\UserCart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $total_price = 0;
    protected $listeners = ['refreshTotalPrice' => '$refresh'];
    public function mount()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $user_carts = UserCart::where('cart_id', $cart->id)->with('product')->get();
        if ($user_carts) {
            foreach ($user_carts as $user_cart) {
                $this->total_price += $user_cart->product->price * $user_cart->quantity;
            }
        }
    }
    public function render()
    {
        return view('livewire.home.checkout');
    }
}
