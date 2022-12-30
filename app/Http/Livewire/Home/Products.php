<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;
use App\Models\Cart;
use App\Models\UserCart;
use Illuminate\Support\Facades\Auth;
use App\Models\License;

class Products extends Component
{
    public $products;


    // check product stock
    private function checkStock($product_id)
    {
        $product = License::where('product_id', $product_id)->where('status', '>', 0)->get();
        if (count($product) - 1 <= 0) {
            return session()->flash('success', 'This product out of stock');
        }
    }
    // add to cart function
    public function addToCart($product_id)
    {
        $this->checkStock($product_id);
        // find cart with current useer login id
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        // create cart if user has no cart yet
        if (empty($cart)) $cart = Cart::create(['user_id' => Auth::user()->id, 'total' => 0]);
        // check is user cart is empty
        $user_cart = UserCart::where('product_id', $product_id)->first();
        $product = Product::find($product_id)->first();

        if (empty($user_cart)) {
            // create new user cart
            UserCart::create([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        } else {
            // update qunatity available user_cart
            $user_cart->update(['quantity' => $user_cart->quantity + 1]);
        }
        $this->emit('addedToCart');
    }
    public function mount()
    {
        $this->products = Product::with('license')->get();
    }
    public function render()
    {
        return view('livewire.home.products');
    }
}
