<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
    $categories = Category::get();
    return view('admin.categories', compact('categories'));
   }

   public function create(){
    return view('admin.add-category');
   }
  

    public function add(Request $request){
        $request->validate([
           'name' => 'required',
           'desc' => 'required'
        ]);
      $addCategory = Category::create([
         'name' => $request->name,
         'desc' => $request->desc,

      ]);
      
      return redirect()->route('categories');
    }
}
