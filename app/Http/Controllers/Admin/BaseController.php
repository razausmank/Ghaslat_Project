<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

class BaseController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
