<?php

namespace App\Http\Livewire\Subcomponents\Alert;

use Livewire\Component;

class Error extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.subcomponents.alert.error');
    }
}
