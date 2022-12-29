<?php

namespace App\Http\Livewire\Dashboard\Category\Modal;

use Livewire\Component;

class Addcategory extends Component
{
    public function submit()
    {
        dd('a');
    }
    public function render()
    {
        return view('livewire.dashboard.category.modal.addcategory');
    }
}
