<?php

namespace App\Http\Livewire\Dashboard\Market;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $picture, $name, $description, $address;
    public $shop;
    protected $listeners = ['refreshInput' => '$refresh'];
    protected $rules = [
        'name' => 'required|min:3|max:100',
        'description' => 'required|min:3',
        'address' => 'required|min:3',
    ];

    public function mount()
    {
        // get shop detail
        $this->shop = Shop::where('user_id', Auth::user()->id)->first();
        // check data
        if (!$this->shop) abort(404);
        // set input value field
        $this->name = $this->shop->name;
        $this->description = $this->shop->description;
        $this->address = $this->shop->address;
    }

    public function submit()
    {
        // handle submit
        // set update payload
        $payload = [
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
        ];
        // check whenter user uploaded a picture
        if ($this->picture) {
            $this->rules['picture'] = 'file|image|max:1024|mimes:jpg,jpeg,png';
            $payload['picture'] = $this->picture->store('pictures/shop', 'public');
        }
        // validate user input
        $this->validate();
        // update shop information
        $this->shop->update($payload);
        session()->flash('success', 'Data has been updated!');
        $this->emitSelf('refreshInput');
    }

    public function render()
    {
        return view('livewire.dashboard.market.update');
    }
}
