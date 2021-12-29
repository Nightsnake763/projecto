<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $roles = Role::get();
        return view('admin/role/add', compact('roles'));
    }

    public function store(RoleRequest $request){
        $role = Role::create($request->all());

        return response()->json([
            'saved' => true,
            'id' => $role->id
        ]);
    }

    public function update(RoleRequest $request, Role $role){
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
