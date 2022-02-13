<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'limit' => 'nullable|numeric',
            'page' => 'nullable|numeric',
        ]);
        $limit = request('limit') ?? Null;
        $page = request('page') ?? Null;
        $productsCount = Product::where('is_active', 1)->count();
        $products = Product::where('is_active', 1)->when($limit !== Null && $page !== Null, function ($query) use ($limit, $page) {
            return $query->skip(($page - 1) * $limit)->take($limit);
        })->get();

        $products= $products->map(function( $product ) {
            $product->image = str_replace('public', 'storage', $product->image );
            return $product;
        });

        return Helper::customResponse( 200 , "Products Retrieved Successfuly", $products, true, $productsCount);
    }
}
