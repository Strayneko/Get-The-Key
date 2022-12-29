<?php

namespace App\Http\Livewire\Dashboard\Product\License;

use App\Models\License;
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
        $this->validate();
        $this->license->update(['license_key' => $this->license_key]);
        return redirect()->route('dashboard.product.license', ['product_id' => $this->product_id])->with('success', 'License key has been updated!');
    }

    public function mount()
    {
        $this->product_id = $this->product_id;
        if ($this->license_id) {
            // find license key by id
            $license = License::find($this->license_id)->first();
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
