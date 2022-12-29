<?php

namespace App\Http\Livewire\Subcomponents\Buttons;

use Livewire\Component;

class Primary extends Component
{
    public $text, $button_type = 'submit', $link = '';
    public function render()
    {
        return view('livewire.subcomponents.buttons.primary');
    }
}
