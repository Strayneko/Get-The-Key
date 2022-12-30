<?php

namespace App\Http\Livewire\Dashboard\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    public $admins;
    protected $listeners = ['refreshTable' => '$refresh'];
    public function deleteAdmin($id)
    {
        $user = User::find($id);
        if (!$user) abort(404);
        if ($user->id == Auth::user()->id) {
            $this->emit('refreshTable');
            return session()->flash('error', "Don't delete yourself :)");
        }
        Storage::disk('public')->delete($user->pricture);
        $user->delete();
        session()->flash('success', 'Data has been deleted');
        $this->emit('refreshTable');
    }
    public function mount()
    {
        $this->admins = User::where('role_id', 3)->get();
    }
    public function render()
    {
        return view('livewire.dashboard.admin.table');
    }
}
