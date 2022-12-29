<?php

namespace App\Http\Livewire\Dashboard\Product\License;

use App\Models\License;
use App\Models\Product;
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
        $this->licenses = License::where('product_id', $this->product_id)->get();
        $this->product_name = Product::find($this->product_id)->first()->name;
    }

    public function render()
    {
        return view('livewire.dashboard.product.license.index', ['product_id' => $this->product_id]);
    }
}
