<?php

namespace App\Http\Livewire\Dashboard\Product\License;

use App\Models\License;
use Livewire\Component;

class Table extends Component
{
    public $licenses;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteLicense($id)
    {
        $license = License::find($id);
        if (!$license) abort(404);
        $license->delete();
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.dashboard.product.license.table');
    }
}
