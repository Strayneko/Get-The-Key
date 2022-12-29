<?php

namespace App\Http\Livewire\Dashboard\Product;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    public $products;
    protected $listeners = ['refreshTable' => '$refresh'];
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404);
        Storage::disk('public')->delete($product->image);
        $product->delete();
        session()->flash('success', 'Data has been deleted');
        $this->emit('refreshTable');
    }

    public function mount()
    {
        // get shop associated with current user login
        $this->shop = Shop::where('user_id', Auth::user()->id)->first();
        $this->products = Product::where('shop_id', $this->shop->id)->with('license')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.product.table');
    }
}
