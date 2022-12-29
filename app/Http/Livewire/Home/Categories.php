<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        // get all category
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.home.categories');
    }
}
