<?php

namespace App\Http\Livewire\Subcomponents;

use Livewire\Component;

class Input extends Component
{
    public  $input_id, $input_name, $label, $placeholder = '', $type = 'text';
    public function render()
    {
        return view('livewire.subcomponents.input');
    }
}
