<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Mail\TestEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail( Request $request )
    {
        $request->validate([
            'headContent' => 'nullable',
            'body' => 'nullable',
            'footerContent' => 'nullable',
            'subject' => 'required',
            'to_email' => 'required'
        ]);

        try {

            Mail::to($request->to_email)->send(new TestEmail( $request->subject, $request->headContent ,$request->body ,$request->footerContent  ));

            return Helper::customResponse( 200 , "Mail sent successfuly", [], true);

        } catch ( Exception $e) {

            return Helper::customResponse( 200 , "Something went wrong", [], false);

        }
    }
}
