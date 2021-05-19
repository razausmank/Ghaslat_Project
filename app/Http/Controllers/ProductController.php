<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStock;
use App\Models\Remark;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products') );
    }

    public function show()
    {
        return view('products.show');
    }

    public function create()
    {
        $product_categories = ProductCategory::all();

        return view('products.create', compact('product_categories') );
    }

    public function store( ProductRequest $request )
    {
        $validated = $request->validated();

        $image_address = $request->file('image')->store('public/product_category');
        unset($validated['image']);


        $product = Product::create($validated + [
            'image' => $image_address
        ]);
        ProductStock::create([
            "product_id" => $product->id,
            "quantity" => $product->quantity,
            'remark_id' =>Remark::create([
                'description' => "Product ( $product->name ) initialized with stock quantity of ( $product->quantity )" ,
                'entity_id' => $product->id,
                'entity_type_id' => 1
            ])->id
        ]);

        return redirect( route('product.index') )->with('success', 'Product successfuly created');

    }

    public function edit( Product $product )
    {
        $product_categories = ProductCategory::all();

        return view('products.edit', compact( 'product', 'product_categories') );
    }

    public function update( Product $product, ProductRequest $request )
    {
        $validated = $request->validated() ;

        $product->update( $validated );

        ProductStock::create([
            "product_id" => $product->id,
            "quantity" => $product->quantity,
            'remark_id' =>Remark::create([
                'description' => "Product ( $product->name ) updated with stock quantity of ( $product->quantity )" ,
                'entity_id' => $product->id,
                'entity_type_id' => 1
            ])->id
        ]);

        return redirect( route('product.index') )->with('success', 'Productsuccessfuly updated');
    }

    public function destroy( Product $product )
    {
        try{
            $product->destroy($product->id);
        } catch( Exception $exception ) {
            return redirect(route('product.index'))->with('failure', 'Product Cannot be deleted');
        }

        return redirect( route('product.index') )->with('success', 'Product successfuly deleted');
    }
}
