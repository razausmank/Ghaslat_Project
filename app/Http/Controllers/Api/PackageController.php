<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        // $request->validate([
        //     'limit' => 'nullable|numeric',
        //     'page' => 'nullable|numeric',
        // ]);

        // $limit = request('limit') ?? Null;
        // $page = request('page') ?? Null;
        // $packages = Product::where('is_package', 1)->where('is_active', 1)->when($limit !== Null && $page !== Null, function ($query) use ($limit, $page) {
        //     return $query->skip(($page - 1) * $limit)->take($limit);
        // })->get();

        // return response($packages, 200);
    }
}
