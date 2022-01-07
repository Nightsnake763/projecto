<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buyView(Product $product){
        $user = User::find($product->user_id);
        return view('user/product/buy', compact('product', 'user'));
    }

    public function productsView(){
        $categories = Category::get();
        $users = User::with('products')->get();
        return view('admin/product/view', compact('categories', 'users'));
    }

    public function store(ProductRequest $request){
        $product = new Product($request->all());
        $product->user_id = auth()->user()->id;

        if ($request->file('image') == null) {
            $product->img_route = "images/default.png";
        } else{
            $name = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('/images'), $name);
            $product->img_route = "images/" . $name;
        };
        $product->save();

        return response()->json([
            'saved' => true,
        ]);
    }

    public function update(ProductRequest $request, Product $product){
        $product->update($request->all());

        if ($request->file('image') != null) {
            $name = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('/images'), $name);
            $product->img_route = "images/" . $name;
        };

        $product->save();

        return response()->json([
            'updated' => true,
            'id' => $product->id
        ]);
    }

    public function delete(Product $product) {
        $product->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
