<?php

namespace App\Http\Livewire\Home;

use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Openshop extends Component
{
    use WithFileUploads;

    public $picture, $name, $description, $address;
    protected $rules = [
        'name' => 'required|min:3|max:100',
        'picture' => 'required|file|image|mimes:jpg,jpeg,png|max:1024',
        'address' => 'required|min:5',
        'description' => 'required|min:3'
    ];
    public function submit()
    {
        // validate user input
        $this->validate();
        $payload = [
            'name' => $this->name,
            'picture' => $this->picture->store('pictures/shop/', 'public'),
            'address' => $this->address,
            'description' => $this->description,
            'user_id' => Auth::user()->id
        ];
        // store shop data
        Shop::create($payload);
        // update user roles
        User::find(Auth::user()->id)->update(['role_id' => 2]);
        return redirect()->route('dashboard.product.index')->with('success', 'Shop has been created!');
    }
    public function render()
    {
        return view('livewire.home.openshop');
    }
}
