<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $roles = Role::with('users')->get();
        return view('admin/user/edit', compact('roles'));
    }

    public function role() {
        $user = auth()->user();
        if ($user->id == 1) {
            $user->assignRole('admin');
        }
        else {
            $user->assignRole('user');
        }
        return redirect('/');
    }

    public function myProducts(){
        $products = auth()->user()->products;
        $categories = Category::get();
        return view('user/product/table', compact('products', 'categories'));
    }

    public function update(Request $request, User $user, Role $role){
        $user->update($request->all());
        $user->removeRole($user->roles[0]->name);
        $user->assignRole($role);

        return response()->json([
            'updated' => true
        ]);
    }

    public function delete(User $user)
    {
        $user->products()->delete();
        $user->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
