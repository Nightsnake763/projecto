<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $categories = Category::get();
        return view('admin/category/add', compact('categories'));
    }

    public function index(Category $category){
        $products = $category->products;
        return view('admin/category/view', compact('category', 'products'));
    }

    public function store(CategoryRequest $request){
        $category = new Category($request->all());
        $category->save();

        return response()->json([
            'saved' => true,
            'id' => $category->id
        ]);
    }

    public function update(CategoryRequest $request, Category $category){
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
