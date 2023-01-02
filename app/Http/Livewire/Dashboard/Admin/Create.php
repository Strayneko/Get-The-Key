<?php

namespace App\Http\Livewire\Dashboard\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class Create extends Component
{
    use WithFileUploads;
    public $email, $password, $name, $phone_number, $birth_date, $gender, $address, $picture;
    public $admin;
    public $user_id;
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

    public function mount()
    {
        $this->user_id = $this->user_id;
        if ($this->user_id) {
            $this->admin = User::find($this->user_id);
            $this->email = $this->admin->email;
            $this->birth_date = $this->admin->birth_date;
            $this->name = $this->admin->name;
            $this->address = $this->admin->address;
            $this->phone_number = $this->admin->phone_number;
            $this->gender = $this->admin->gender;
        }
    }

    public function update()
    {
        $this->rules = [
            'email'        => 'email|min:3|max:100',
            'password'     => 'required|min:5',
            'name'    => 'required|min:3|max:50',
            'phone_number' => 'min:10:max:13s',
            'birth_date'   => 'date',
            'gender'       => 'numeric|digits_between:0,1',
            'address'      => 'min:3',
        ];
        // add unique rules when email is changed
        if ($this->email != $this->admin->email) $this->rules['email'] .= '|unique:users';
        // add unique rules when number is changed
        if ($this->phone_number != $this->admin->phone_number) $this->rules['phone_number'] .= '|unique:users';

        $payload = [
            'email'        => $this->email,
            'password'     => $this->password,
            'name'    => $this->name,
            'phone_number' => $this->phone_number,
            'birth_date'   => $this->birth_date,
            'gender'       => $this->gender,
            'address'      => $this->address,
        ];
        if ($this->picture) {
            $this->rules['picture'] = 'file|image|max:1024|mimes:jpg,jpeg,png';
            $payload['picture'] = $this->picture->store('pictures/user', 'public');
        }
        $this->validate();
        $this->admin->update($payload);
        return redirect()->route('dashboard.admin.index')->with('success', 'Data has been updated');
    }

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
        if ($this->user_id) return view('livewire.dashboard.admin.edit');
        return view('livewire.dashboard.admin.create');
    }
}
