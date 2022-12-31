<?php

namespace App\Http\Livewire\Home\Transaction;

use App\Models\License;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $transaction;
    public $licenses;
    public $product;

    public function mount()
    {

        // check transaction availabilty
        if (count($this->transaction) == 0) abort(404);
        // check transaction status to prevent user from accessing the page before transaction is done
        if ($this->transaction->first()->status != 2) abort(403);

        $this->licenses = License::where('transaction_id', $this->transaction->first()->id)->get();
        $this->product = Product::find($this->licenses->first()->product_id);
    }
    public function render()
    {
        return view('livewire.home.transaction.detail');
    }
}
