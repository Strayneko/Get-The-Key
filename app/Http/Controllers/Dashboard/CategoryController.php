<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function checkCategory($id)
    {
        // get category by id
        $category = Category::find($id);
        // return 404 error if category data not found in database
        if (!$category) return abort(404);
        return $category;
    }
    // TODO: show all categories
    public function index()
    {
        return view('dashboard.category.index');
    }
    // TODO: show create category form
    public function create()
    {
        return view('dasboard.category.create');
    }
    // TODO: store category to database
    public function store(Request $request)
    {
        // validate user input
        $validated = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        // check validation status
        // if fails redirect user back with last input and validation error message
        if ($validated->fails()) return redirect()->back()->withInput()->withErrors($validated->messages()->all());
        $validated = $validated->getData();
        // store image
        $validated['image'] = $request->file('image')->store('images/category/', 'public');
        // store data
        Category::create($validated);
        return redirect()->route('dashboard.index')->with('success', 'Categroy has been added!');
    }

    // TODO: show edit category form by id
    public function edit($id)
    {
        // check is category available
        $category = $this->checkCategory($id);
        return view('dasboard.category.edit', ['category' => $category]);
    }
    // TODO: update category by id
    public function update(Request $request, $id)
    {
        // check is category available
        $category = $this->checkCategory($id);
        // validate input
        $validated = Validator::make($request->all(), [
            'name' => 'min:3',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);
        // check validation status
        // if fails redirect user back with last input and validation error message
        if ($validated->fails()) return redirect()->back()->withInput()->withErrors($validated->messages()->all());
        // check whenther user upload an image
        if ($request->input('image')) {
            // replace image with new image
            Storage::disk('public')->delete($category->image);
            // store new image and image name
            $validated['image'] = $request->input('image')->store('images/category/', 'public');
        }
        // update data
        $category->update($validated);
        return redirect()->route('dashboard.category.index')->with('success', 'Categroy has been updated!');
    }
    // TODO: delete category by id
    public function delete(Request $request, $id)
    {
        // check is category available
        $category = $this->checkCategory($id);
        // delete image
        Storage::disk('public')->delete($category->image);
        // delete data from database
        $category->delete();
        return redirect()->route('dasboard.category.index')->with('success', 'Category has been deleted!');
    }
}
