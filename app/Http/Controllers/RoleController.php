<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function view(){
        $roles = Role::get();
        return view('addRole', compact('roles'));
    }

    public function store(Request $request){
        $role = new Role($request->all());
        $role->save();

        return response()->json([
            'saved' => true,
            'id' => $role->id
        ]);
    }

    public function update(Request $request, Role $role){
        $role->update($request->all());
        $role->save();

        return response()->json([
            'saved' => true,
            'role' => $role
        ]);
    }

    public function delete(Role $role){
        $role->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
