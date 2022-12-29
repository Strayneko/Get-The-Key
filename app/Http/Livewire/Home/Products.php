<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products;


    // add to cart function
    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.home.products');
    }
}
