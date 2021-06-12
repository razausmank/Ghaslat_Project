<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //list all the existing roles in the system
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => request('name'),
            'label' => request('label')
        ]);

        $role->syncPermissions(request('permissions'));

        return redirect(route('role.index'))->with('success', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => request('name'),
            'label' => request('label')
        ]);

        $role->syncPermissions(request('permissions'));

        return redirect(route('role.index'))->with('success', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->destroy($role->id);
    }
}