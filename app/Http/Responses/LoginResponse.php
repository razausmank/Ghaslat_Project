<?php
namespace App\Http\Responses;

use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        $role = Role::where('label', 'pos_user')->first();

            if (auth()->user()->pages()->contains('POS') && (count(auth()->user()->pages()) < 2  )) {
                return  redirect()->intended(RouteServiceProvider::POS);

            }else {
                return  redirect()->intended(RouteServiceProvider::HOME);
            }

        // if (auth()->user()->roles->contains('id', $role->id)) {
        //     return redirect()->intended(config('fortify.home'));
        // }
        // return redirect()->intended(config('fortify.pos'));
    }
}
