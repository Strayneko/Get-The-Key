<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $product_id = 0;
    public $category_id, $shop_id, $name, $price, $stock, $description, $image, $type, $licensing_term, $platform_supported, $manufacture, $max_user;
    public $categories;
    public $product;
    protected $listeners = ['deleteProduct'];
    // set validation rules
    protected $rules = [
        'category_id' => 'required|numeric|min:1',
        'name' => 'required|min:3|max:255',
        'price' => 'required|numeric|min:100',
        'stock' => 'required|numeric|min:1',
        'description' => 'required|min:3',
        'image' => 'required|file|image|max:1024|mimes:jpg,jpeg,png',
        'licensing_term' => 'required|min:1|max:30',
        'manufacture' => 'required|min:3|max:50',
        'max_user' => 'required|numeric|min:1',

    ];
    protected $payload = [];

    public function mount()
    {
        $this->categories = Category::all();
        // check if there is product_id passed
        if ($this->product_id > 0) {
            // get product by id
            $product = Product::find($this->product_id);
            // give 404 message if product not found
            if (!$product) abort(404);
            $this->product = $product;
            // set attribute
            $this->name = $product->name;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->description = $product->description;
            $this->type = $product->type;
            $this->licensing_term = $product->licensing_term;
            $this->manufacture = $product->manufacture;
            $this->category_id = $product->category_id;
            $this->max_user = $product->max_user;
        }
    }

    // base payload
    private function getPayload()
    {
        return [
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'licensing_term' => $this->licensing_term,
            'manufacture' => $this->manufacture,
            'max_user' => $this->max_user,
            'shop_id' => 1
        ];
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
            Storage::disk('public')->delete($this->product->image);
            $payload['image'] = $this->image->store('images/product/', 'public');
        }
        // remove image validation rules
        unset($this->rules['image']);
        $this->validate();
        $this->product->update($payload);
        return redirect()->route('dashboard.product.index')->with('success', 'Product has been updated!');
    }

    public function deleteProduct($id)
    {
        dd($id);
    }

    public function submit()
    {
        // validate user input
        $this->validate();

        // store image
        $payload = $this->getPayload();
        $payload['image'] = $this->image->store('images/product/', 'public');
        // store data

        Product::create($payload);
        return redirect()->route('dashboard.product.index')->with('success', 'Product has been added!');
    }
    public function render()
    {
        if ($this->product_id) return view('livewire.dashboard.product.update');
        return view('livewire.dashboard.product.create');
    }
}
