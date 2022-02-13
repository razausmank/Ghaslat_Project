<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerCreditCardInfoController extends Controller
{
    public function storeCreditCardDetails( Request $request ) {

        $request->validate([
            'credit_card_last_digits' => 'required',
        ]);

        $customer = Customer::find( auth()->user()->customer_id );

        $customer->update(['credit_card_last_digits' => $request->credit_card_last_digits ]);

        return Helper::customResponse( 201 , "Customer credit card info saved successfuly", $customer->credit_card_last_digits, true);
    }

    public function getCreditCardDetails( ) {

        $customer = Customer::find( auth()->user()->customer_id );

        return Helper::customResponse( 200 , "Customer credit card retrieved successfuly", $customer->credit_card_last_digits, true);

    }
}
