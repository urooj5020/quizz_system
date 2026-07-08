<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        $category = new Category;

        return view('admin.add-category', compact('category'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);
        $addCategory = Category::create([
            'name' => $request->name,
            'desc' => $request->desc,

        ]);

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id); // Existing data pass karein

        return view('admin.add-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => $request->status,
        ]);
        $category->save();

        return redirect()->route('categories');

    }
}
