<?php

namespace App\Http\Livewire\Home;

use App\Models\Cart;
use App\Models\UserCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductCart extends Component
{
    public $cart;
    public $user_carts;
    public $quantity;
    public $total_price;
    protected $listeners = ['refreshCart' => '$refresh'];
    public function mount()
    {
        $this->cart = Cart::where('user_id', Auth::user()->id)->first();
        if ($this->cart) {
            $this->user_carts = UserCart::where('cart_id', $this->cart->id)->with('product')->get();

            // count total price
            $total_price = 0;
            foreach ($this->user_carts as $user_cart) {
                $total_price += $user_cart->product->price * $user_cart->quantity;
            }
            $this->total_price = $total_price;
        } else {
            $this->user_carts = [];
        }
    }

    public function dehydrate()
    {
        $this->mount();
    }
    public function addCartQuantity($product_id)
    {
        // get cart
        $product_in_cart = UserCart::where('product_id', $product_id)->first();
        // update product quantity in cart
        $product_in_cart->update(['quantity' => $product_in_cart->quantity + 1]);
        // trigger event
        $this->emit('refreshTotalPrice');
        $this->emit('refreshCart');
    }

    public function removeCartItem($product_id)
    {
        // get cart
        $product_in_cart = UserCart::where('product_id', $product_id)->first();
        //remove product from cart
        $product_in_cart->delete();
        session()->flash('success', 'Product has been removed from cart!');
        $this->emit('refreshCart');
    }

    public function setCartQuantity($qty, $product_id)
    {
        $product_in_cart = UserCart::where('product_id', $product_id)->first();
        $product_in_cart->update(['quantity' => $qty]);
        $this->emit('refreshCart');
    }

    public function minCartQuantity($product_id)
    {
        $product_in_cart = UserCart::where('product_id', $product_id)->first();
        $product_in_cart->update(['quantity' => $product_in_cart->quantity - 1]);

        $this->emit('refreshCart');
    }
    public function render()
    {

        return view('livewire.home.product-cart');
    }
}
