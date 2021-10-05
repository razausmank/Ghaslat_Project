<?php

namespace App\Helpers;

class Helper
{

    public static function current_user()
    {
        return auth()->user();
    }

    public static function current_user_id()
    {
        return auth()->user()->id;
    }

    public static function generateRandomString($length = 10) {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
