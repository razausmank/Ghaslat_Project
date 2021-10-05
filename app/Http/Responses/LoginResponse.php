<?php
namespace App\Http\Responses;

use App\Models\Role;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        $role = Role::where('label', 'pos_user')->first();

        if (auth()->user()->roles->contains('id', $role->id)) {
            return redirect()->intended(config('fortify.home'));
        }
        return redirect()->intended(config('fortify.home'));
    }
}
