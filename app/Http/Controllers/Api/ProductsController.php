<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $limit = request('limit') ?? Null;
        $page = request('page') ?? Null;
        $products = Product::where('is_package', 0)->where('is_active', 1)->when($limit !== Null && $page !== Null, function ($query) use ($limit, $page) {
            return $query->skip(($page - 1) * $limit)->take($limit);
        })->get();

        return $products;
    }
}
