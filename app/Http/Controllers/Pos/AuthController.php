<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Pos\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    public function login_view()
    {
        return view('pos.auth.login');
    }

    public function login(Request $request)
    {

        Fortify::authenticateUsing(function (LoginRequest $request) {
            $user = User::where('email', $request->email)->first();
            if (
                $user &&
                Hash::check($request->password, $user->password)
                &&  !$user->customer_id
                && $user->roles->contains('id', 4)
            ) {
                return redirect(RouteServiceProvider::POS);
            } else {
                return redirect(RouteServiceProvider::POS);
            }
        });
    }
}
