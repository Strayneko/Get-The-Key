<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.dashboard.product.index');
    }
}
