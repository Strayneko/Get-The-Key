<?php

namespace App\Http\Livewire\Home\Transaction;

use App\Models\License;
use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $transaction;
    public $licenses;
    public $product;

    public function mount()
    {

        $this->licenses = License::where('transaction_id', $this->transaction->first()->id)->get();
        $this->product = Product::find($this->licenses->first()->product_id);
    }
    public function render()
    {
        return view('livewire.home.transaction.detail');
    }
}
