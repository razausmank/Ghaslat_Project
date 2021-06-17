<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function destructureTwoDimArrayToSeperateArrays($array, $key1, $key2)
    {
        foreach ($array as $index => $item) {

            $first_array[$index] = $item[$key1];
            $second_array[$index] = $item[$key2];
        }

        return [$first_array, $second_array];
    }
}
