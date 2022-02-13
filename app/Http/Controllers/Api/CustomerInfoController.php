<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Models\Customer;
use App\Models\CustomerInfo;
use Exception;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    public function SaveCustomersInfoOutOfArea( Request $request) {

        $validatedAttributes = $request->validate([
            'email' => 'required|email',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'device_id' => 'required'
        ]);

        try {

        $customerInfo = CustomerInfo::create( $validatedAttributes );

        return Helper::customResponse(200,'Customer info succesfully saved', $customerInfo , true);
        } catch ( Exception $e) {
            info($e);
            return Helper::customResponse(400,'Uh Oh! something went wrong', $e , false);
        }

    }

    public function CheckUserLocationInServiceArea( Request $request ) {
        $request->validate([
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'
        ]);

        // the positions 2nd digits is equal to 1.1 km so this 3-+ from the current location
        $radius_in_km = 0.0300 ;
        $store_longitude = 55.4651805 ;
        $store_latitude = 25.3052797;

        $min_store_longitude = $store_longitude - $radius_in_km ;
        $max_store_longitude = $store_longitude + $radius_in_km ;

        $min_store_latitude = $store_latitude - $radius_in_km ;
        $max_store_latitude = $store_latitude + $radius_in_km ;

        if (
            (( $request->longitude >= $min_store_longitude ) && ($request->longitude <= $max_store_longitude)) &&
            (( $request->latitude  >= $min_store_latitude ) &&  ( $request->latitude <= $max_store_latitude ))
            )
        {
            return Helper::customResponse(200,'Customer is within service area', true , true);
        }

        return Helper::customResponse(400,'Customer is not within service area', false , false);

    }

    public function updateCustomerInfo( Request $request ) {
        $validated = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'apartment' => 'nullable',
            'address_line_1' => 'nullable',
            'address_line_2' => 'nullable',
        ]);

        try{

            $customer = Customer::find( auth()->user()->customer_id );

            $customer->update($validated);

            return Helper::customResponse(200,'Customer info updated successfully', $customer , true);

        } catch ( Exception $e )
        {
            return Helper::customResponse(400,'Something went wrong', null , false);

        }
    }
}
