<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Create extends Component
{
    use WithFileUploads;
    public $name, $image, $category, $category_id = 0;
    protected $rules = [
        'name' => 'required|min:3|max:50',
        'image' => 'required|file|image|mimes:jpg,jpeg,png|max:1024'
    ];
    private function getPayload()
    {
        return [
            'name' => $this->name,
        ];
    }
    public function submit()
    {
        $this->validate();
        // get payload
        $payload = $this->getPayload();
        // store image
        $payload['image'] = $this->image->store('images/categories/', 'public');
        // store category to database
        Category::create($payload);
        return redirect()->route('dashboard.category.index')->with('success', 'Category has been added!');
    }

    public function mount()
    {
        // if there is id in route params
        if ($this->category_id > 0) {
            // get category by id
            $this->category = Category::find($this->category_id);
            // set attribute
            $this->name = $this->category->name;
        }
    }

    // update product
    public function update()
    {
        // change validation atribute of image when update data
        // validate user input
        // check whenter user upload an image
        $payload = $this->getPayload();
        if ($this->image) {
            $this->rules['image'] = 'file|image|max:1024|mimes:jpg,jpeg,png';
            // delete image from storage
            Storage::disk('public')->delete($this->category->image);
            $payload['image'] = $this->image->store('images/categories/', 'public');
        }
        // remove image validation rules
        unset($this->rules['image']);
        $this->validate();
        $this->category->update($payload);
        return redirect()->route('dashboard.category.index')->with('success', 'Product has been updated!');
    }
    public function render()
    {
        // if there is category_id passed return update view
        if ($this->category_id) return view('livewire.dashboard.category.update');
        return view('livewire.dashboard.category.create');
    }
}
