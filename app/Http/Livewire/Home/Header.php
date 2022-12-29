<?php

namespace App\Http\Livewire\Home;

use App\Models\Shop;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $shop;

    public function mount()
    {
        if (!Auth::guest()) $this->shop = Shop::where('user_id', Auth::user()->id)->first();
    }
    public function render()
    {
        return view('livewire.home.header');
    }
}
