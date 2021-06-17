<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class UserController extends Controller
{
    // List all the users with a bunch of avaialble actions
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request, CreatesNewUsers $creator)
    {
        $user =  event(new Registered($creator->create($request->all())));

        return redirect(route('user.index'))->with('success', 'User Created Successfully');
    }

    // get view to show all the roles a user has
    public function edit_user_roles(User $user)
    {
        $roles = Role::all();
        return view('users.edit_user_roles', compact('user', 'roles'));
    }

    // sync the roles of the user
    public function update_user_roles(User $user, Request $request)
    {
        $user->syncRoles(request('roles'));
        return redirect(route('user.index'))->with('success', 'User Roles Updated Successfuly');
    }
}
