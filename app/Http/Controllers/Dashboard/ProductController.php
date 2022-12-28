<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function checkProduct($id)
    {
        // get product by id
        $product = Product::find($id);
        // return 404 error if product data not found in database
        if (!$product) return abort(404);
        return $product;
    }
    // TODO: show all 
    public function index()
    {
    }
    // TODO: show one  by id
    public function show($id)
    {
    }
    // TODO: show create  form
    public function create()
    {
    }
    // TODO: store  to database
    public function store(Request $request)
    {
        // validate user input
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|numeric|min:1',
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:100',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|min:3',
            'image' => 'required|file|image|max:1024|mimes:jpg,jpeg,png',
            'type' => 'required|min:3|max:10',
            'licensing_term' => 'required|min:3|max:30',
            'platform_supported' => 'required|min:1',
            'manufacture' => 'required|min:3|max:50',
            'max_user' => 'required|numeric|min:1',
        ]);
        // check validation status
        // if fails redirect user back with last input and validation error message
        if ($validate->fails()) return redirect()->back()->withInput()->withErrors($validate->messages()->all());
        // get validated data
        $validated = $validate->getData();
        // remove unused variable
        unset($validate);
        // store image
        $validated['image'] = $request->file('image')->store('images/product/', 'public');
        // store data
        Product::create($validated);
        return redirect()->route('dashboard.product.index')->with('success', 'Product has been added!');
    }
    // TODO: show edit  form by id
    public function edit($id)
    {
    }
    // TODO: update  by id
    public function update(Request $request, $id)
    {
        // check product availability
        $product = $this->checkProduct($id);
        // validate user input
        $validate = Validator::make($request->all(), [
            'category_id' => 'numeric|min:1',
            'name' => 'min:3|max:255',
            'price' => 'numeric|min:100',
            'stock' => 'numeric|min:1',
            'description' => 'min:3',
            'image' => 'file|image|max:1024|mimes:jpg,jpeg,png',
            'type' => 'min:3|max:10',
            'licensing_term' => 'min:3|max:30',
            'platform_supported' => 'min:1',
            'manufacture' => 'min:3|max:50',
            'max_user' => 'numeric|min:1',
        ]);
        // check validation status
        // if fails redirect user back with last input and validation error message
        if ($validate->fails()) return redirect()->back()->withInput()->withErrors($validate->messages()->all());
        // get validated data
        $validated = $validate->getData();
        // remove unused variable
        unset($validate);
        // check whenther user upload an image
        if ($request->input('image')) {
            // replace image with new image
            Storage::disk('public')->delete($product->image);
            // store new image and image name
            $validated['image'] = $request->input('image')->store('images/category/', 'public');
        }
        // update product data
        $product->update($validated);
    }
    // TODO: delete  by id
    public function delete(Request $request, $id)
    {
    }
}
