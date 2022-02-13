<?php

namespace App\Http\Controllers\Admin;

use App\Models\PagePermission;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:New Role')->except('index');
    //     $this->middleware('can:Role Listing')->only('index');
    // }
    //list all the existing roles in the system
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $pages = PagePermission::all();
        return view('roles.create', compact('permissions', 'pages'));
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
        $role->syncPagePermissions(request('pages'));

        return redirect(route('role.index'))->with('success', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $pages = PagePermission::all();

        return view('roles.edit', compact('role', 'permissions', 'pages'));
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
        // dd(request('pages'));
        $role->syncPermissions(request('permissions'));
        $role->pagePermissions()->sync(request('pages'));

        return redirect(route('role.index'))->with('success', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->destroy($role->id);
        return redirect(route('role.index'))->with('success', 'Role Deleted Successfully');
    }
}
