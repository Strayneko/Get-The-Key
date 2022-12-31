<?php

namespace App\Http\Livewire\Dashboard\Product\License;

use App\Models\License;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $product_id = 0;

    public $licenses;
    public $product_name;

    public function mount()
    {
        $this->product_id = $this->product_id;
        // get all license key by product id
        $shop = Shop::where('user_id', Auth::user()->id)->first();
        if (!$shop) abort(404);
        $product = Product::where('shop_id', $shop->id)->where('id', $this->product_id)->first();
        if (!$product) abort(404);
        $this->licenses = License::where('product_id', $product->id)->get();
        $this->product_name = $product->name;
    }

    public function render()
    {
        return view('livewire.dashboard.product.license.index', ['product_id' => $this->product_id]);
    }
}
