<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {

        return view('livewire.dashboard.category.index');
    }
}
