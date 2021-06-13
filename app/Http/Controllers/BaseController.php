<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function dashboard()
    {
        return view('base.dashboard');
    }
}
