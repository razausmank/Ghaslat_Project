<?php

namespace App\Classes;

use Exception;
use Twilio\Rest\Client;

class Twillio
{

    public static function sendSms( $receiverNumber , $message ) {

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $response = $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);
            return json_encode(true);

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
            info($e);
            return json_encode(false) ;
        }
    }
}
