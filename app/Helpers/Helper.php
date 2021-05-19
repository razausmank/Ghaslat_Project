<?php

namespace App\Helpers;

class Helper {

    public static function current_user()
    {
        return auth()->user() ;
    }

    public static function current_user_id()
    {
        return auth()->user()->id ;
    }

}
