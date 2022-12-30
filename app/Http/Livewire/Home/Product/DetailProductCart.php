<?php

namespace App\Http\Livewire\Home\Product;

use App\Http\Livewire\Home\ProductCart;
use App\Models\UserCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class DetailProductCart extends Component
{
    public $product;
    public $total = 0;
    public $productInCart;
    public $cart;

    protected $listeners = ['refreshCart' => '$refresh'];

    public function render()
    {
        return view('livewire.home.product.detail-product-cart');
    }


    public function initilizeCart()
    {
        // get cart associated with current user login
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        // create new cart if no cart found
        if (!$cart) $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'total' => 0
        ]);
        $this->cart = $cart;
    }

    public function setTotal()
    {
        $user_cart = UserCart::where('product_id', $this->product->id)->first();
        if ($user_cart) $this->total = $user_cart->quantity;
    }
    public function mount()
    {
        $this->setTotal();
    }

    public function addToCart()
    {
        $this->initilizeCart();
        $user_cart = UserCart::where('product_id', $this->product->id)->first();
        if (!$user_cart) {
            $user_cart = UserCart::create([
                'cart_id' => $this->cart->id,
                'product_id' => $this->product->id,
                'quantity' => 1,
            ]);
        } else {
            $user_cart->update(['quantity' => $user_cart->quantity + 1]);
        }
        $this->setTotal();
    }


    public function minCart()
    {
        $this->initilizeCart();
        $user_cart = UserCart::where('product_id', $this->product->id)->first();
        if (!$user_cart) return;
        if ($user_cart->quantity == 1) {
            $user_cart->delete();
            $this->total = 0;
        } else {
            $user_cart->update(['quantity' => $user_cart->quantity - 1]);
        }
        $this->setTotal();
    }
}
