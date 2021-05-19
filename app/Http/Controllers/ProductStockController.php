<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Remark;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index()
    {
        $products_stock = ProductStock::all();

        return view('product_stocks.index' , compact( 'products_stock' ) );
    }

    public function create()
    {
        $products = Product::all() ;

        return view('product_stocks.create' , compact( 'products' ) );
    }

    public function store( Request $request )
    {
        $validated = $request->validate([
            'quantity' => ['required'],
            'product_id' => ['required' , 'exists:products,id'],
            'remark' => ['nullable']
        ]);
        ProductStock::create([
            "product_id" =>request('product_id'),
            "quantity" =>  request('quantity') ,
            'remark_id' =>Remark::create([
                'description' =>  request('remark') ,
                'entity_id' => request('product_id'),
                'entity_type_id' => 1
            ])->id
        ]);

        $product = Product::find(request('product_id'));
        $product->update([ 'quantity' => $product->quantity + request('quantity')]);

        return redirect( route('productstock.index') )->with('success', 'Product Stock successfuly added');

    }
}
