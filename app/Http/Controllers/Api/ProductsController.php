<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($limit = Null, $page = Null)
    {
        $products = Product::where('is_package', 0)->where('is_active', 1)->get();

        return $products;
    }
}
