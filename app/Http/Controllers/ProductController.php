<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function storeView($id){
        $categories = Category::get();
        return view('addProduct',compact('id', 'categories'));
    }

    public function buy_view(Product $product){
        return view('buy', compact('product'));
    }

    public function store(Request $request, $id){
        $product = new Product($request->all());
        $product->user_id = $id;
        $product->img_route = "/images/default.png";
        $product->save();

        return response()->json([
            'saved' => true,
        ]);
    }

    public function update(Request $request, Product $product){
        $product->update($request->all());
        $product->save();

        return response()->json([
            'updated' => true
        ]);
    }

    public function delete(Product $product) {
        $product->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
