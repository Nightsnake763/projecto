<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users_view()
    {
        $users = User::get();
        $roles = Role::get();
        return view('users', compact('users', 'roles'));
    }

    public function delete(User $user)
    {
        $user->products->delete();
        $user->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
