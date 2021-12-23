<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('welcome', compact('categories'));
    }

    /*
    public function users_view()
    {
        $users = User::get();
        $roles = Role::get();
        return view('users', compact('users', 'roles'));
    }
    */
}
