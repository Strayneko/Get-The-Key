<?php

namespace App\Http\Livewire\Dashboard\Product\License;

use App\Models\License;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $product_id;
    public $license_key;
    public $license_id;
    public $license;

    protected $rules = [
        'license_key' => 'required'
    ];

    public function submit()
    {
        $this->rules['license_key'] .= '|unique:licenses';
        // validate user input
        $this->validate();
        $payload = [
            'license_key' => $this->license_key,
            'status' => 1,
            'product_id' => $this->product_id
        ];
        License::create($payload);
        return redirect()->route('dashboard.product.license', ['product_id' => $this->product_id])->with('success', 'License key has been added!');
    }

    public function update()
    {
        if ($this->license_key != $this->license->license_key) $this->rules['license_key'] .= '|unique:licenses';
        $this->validate();
        $this->license->update(['license_key' => $this->license_key]);
        return redirect()->route('dashboard.product.license', ['product_id' => $this->product_id])->with('success', 'License key has been updated!');
    }

    public function mount()
    {
        $this->product_id = $this->product_id;
        if ($this->license_id) {
            $shop = Shop::where('user_id', Auth::user()->id)->first();
            $product = Product::where('shop_id', $shop->id)->first();
            // find license key by id
            $license = License::where('id', $this->license_id)->where('product_id', $product->id)->first();
            if (!$license) abort(404);
            // set product id
            $this->product_id = $license->product_id;
            $this->license_key = $license->license_key;
            $this->license = $license;
        }
    }

    public function render()
    {
        if ($this->license_id) return view('livewire.dashboard.product.license.update');
        return view('livewire.dashboard.product.license.create');
    }
}
