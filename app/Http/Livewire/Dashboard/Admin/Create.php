<?php

namespace App\Http\Livewire\Dashboard\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $email, $password, $name, $phone_number, $birth_date, $gender, $address, $picture;
    protected $rules = [
        'email'        => 'required|email|min:3|unique:users|max:100',
        'password'     => 'required|min:5',
        'name'    => 'required|min:3|max:50',
        'phone_number' => 'required|min:10:max:13|unique:users',
        'birth_date'   => 'required|date',
        'gender'       => 'required|numeric|digits_between:0,1',
        'address'      => 'required|min:3',
        'picture'      => 'required|file|image|mimes:jpg,png,jpeg'
    ];

    public function submit()
    {
        // validate user input
        $this->validate();
        $payload = [
            'role_id'      => 3,
            'email'        => $this->email,
            'password'     => $this->password,
            'name'    => $this->name,
            'phone_number' => $this->phone_number,
            'birth_date'   => $this->birth_date,
            'gender'       => $this->gender,
            'address'      => $this->gender,
            'picture'      => $this->picture->store('pictures/user', 'public'),

        ];

        User::create($payload);
        return redirect()->route('dashboard.admin.index')->with('success', 'New admin successfully added!');
    }
    public function render()
    {
        return view('livewire.dashboard.admin.create');
    }
}
