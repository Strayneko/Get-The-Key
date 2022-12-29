<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Table extends Component
{
    public $categories;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) abort(404);
        Storage::disk('public')->delete($category->image);
        $category->delete();
        $this->emit('refreshTable');
    }

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {

        return view('livewire.dashboard.category.table');
    }
}
