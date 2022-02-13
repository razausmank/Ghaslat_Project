<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Mail\TestEmail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Fortify;

class CustomerAuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'description' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable'
        ]);

        // check if email is unique
        $user = User::where('is_active', 1)->where('email',  $fields['email'])->first();
        if ( $user )
        {
            return Helper::customResponse( 400 , "Email is already in use", [], false);
        }
        // check if phone is unique
        $user = User::where('is_active', 1)->where('phone',  $fields['phone'])->first();
        if ( $user )
        {
            return Helper::customResponse( 400 , "Phone is already in use", [], false);
        }

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone']
        ]);

        $customer = Customer::create($fields);

        $user->update(['customer_id' => $customer->id]);

        $user->generateCode();

        Mail::to($user->email)->send(new TestEmail("Account verification", "You're receiving this message because you recently signed up for Ghaslat.", "Your 2fa code is ". $user->getCode() , "Thanks" ));

        $token = $user->createToken('userToken')->plainTextToken;
        $user = User::find( $user->id) ;
        $response  = [
            'user' => $user,
            'token' => $token
        ];

        return Helper::customResponse( 201 , "Account created successfuly", $response, true);

    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check if user is available
        $user = User::where('is_active', 1)->where('email', $fields['email'])->without('userCode')->first();

        if (!$user || !Hash::check($fields['password'], $user->password) || !$user->customer_id) {
            return response([
                'message' => 'Invalid Credentials'
            ], 401);
        }


        $token = $user->createToken('userToken')->plainTextToken;

        $response  = [
            'user' => $user,
            'token' => $token
        ];

        return Helper::customResponse( 200 , "Logged in successfuly", $response, true);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return Helper::customResponse( 200 , "Logged out successfuly", [], true);

    }

    public function reset_password(Request $request){
        $request->validate([Fortify::email() => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = $this->broker()->sendResetLink(
            $request->only(Fortify::email())
        );

        return $status == Password::RESET_LINK_SENT
                    ? Helper::customResponse( 200 , "Email sent successfuly", [], true)
                    : Helper::customResponse( 400 , "Something went wrong", [], false);
    }

    public function verifyOtp( Request $request )
    {
        $request->validate([
            'two_factor_code' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
        if ( !$user->isCodeExpired() && $user->validateCode( $request->two_factor_code )  )
        {
            $user->update(['is_active' => 1]);
            return Helper::customResponse( 200 , "User verified successfuly", $user, true);
        }

        return Helper::customResponse( 400 , "The two_factor_code entered is either invalid or expired", [], false);

    }

    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }

}
