<?php

namespace App\Http\Livewire\Home;

use App\Models\Cart;
use App\Models\UserCart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Checkout extends Component
{
    use WithFileUploads;
    public $transaction;
    public $receipt_image, $password;
    protected $rules = [
        'receipt_image' => 'required|file|image|max:1024|mimes:jpg,jpeg,png',
        'password' => 'required|min:3'
    ];

    public function checkout()
    {
        // validate input
        $this->validate();
        // check user password 
        if (!Hash::check($this->password, Auth::user()->password)) {
            session()->flash('error', 'Wrong password! Please try again!');
            return;
        }
        // store image
        $image = $this->receipt_image->store('images/receipt', 'public');
        $this->transaction->update([
            'paid_date' => now(),
            'receipt_image' => $image,
            'status' => 1
        ]);
        session()->flash('success', 'Payment success! Please wait until verification!');
    }
    public function render()
    {
        return view('livewire.home.checkout');
    }
}
