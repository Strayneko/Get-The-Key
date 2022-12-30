<?php

namespace App\Http\Livewire\Home;

use App\Models\Cart;
use App\Models\License;
use App\Models\Product;
use App\Models\Transaction;
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
        // remove item from cart is quantity below 1
        if ($product_in_cart->quantity == 1) $this->removeCartItem($product_id);
        $product_in_cart->update(['quantity' => $product_in_cart->quantity - 1]);

        $this->emit('refreshCart');
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $checkout_item = UserCart::where('cart_id', $cart->id);
        $license_items = [];
        // check product stock
        foreach ($checkout_item->get() as $item) {
            // prevent checkout when product is out of stock
            if ($item->quantity > count($item->product->license)) return session()->flash('error', 'Product ' . $item->product->name . ' has out of stock!');
            // update product license status
            $licenses = License::where('product_id', $item->product->id)->where('status', '>', 0)->limit($item->quantity)->get();
            foreach ($licenses as $license) {

                array_push($license_items, $license);
            }
        }
        // store transaction record to database
        $checkout = Transaction::create([
            'user_id' => Auth::user()->id,
            'cart_id' => $cart->id,
            'paid_date' => null,
            'status' => '0',
            'total' => $this->total_price,
            'receipt_image' => null
        ]);
        foreach ($license_items as $item) {
            // update license stock
            $item->update(['transaction_id' => $checkout->id, 'status' => 0]);
        }
        // remove cart from database
        $checkout_item->delete();
        $cart->delete();
        return redirect()->route('home.checkout', ['id' => $checkout])->with('success', 'Checkout success! Please upload your transfer receipt!');
    }

    public function render()
    {

        return view('livewire.home.product-cart');
    }
}
