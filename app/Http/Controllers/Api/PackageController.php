<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index($limit = Null, $page = Null)
    {
        $packages = Product::where('is_package', 1)->where('is_active', 1)->get();

        return $packages;
    }
}
