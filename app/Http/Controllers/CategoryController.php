<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(){
        $categories = Category::get();
        return view('addCategory', compact('categories'));
    }

    public function index(Category $category){
        $products = $category->products;
        return view('viewCategory', compact('category', 'products'));
    }

    public function store(Request $request){
        $category = new Category($request->all());
        $category->save();

        return response()->json([
            'saved' => true,
            'id' => $category->id
        ]);
    }

    public function update(Request $request, Category $category){
        $category->update($request->all());
        $category->save();

        return response()->json([
            'saved' => true,
            'category' => $category
        ]);
    }

    public function delete(Category $category){
        $category->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
