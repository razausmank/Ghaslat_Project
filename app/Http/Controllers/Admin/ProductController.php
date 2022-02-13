<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStock;
use App\Models\Remark;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:New Product')->except('index');
    //     $this->middleware("can:Products List")->only('index');
    // }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show()
    {
        return view('products.show');
    }

    public function create()
    {
        $product_categories = ProductCategory::all();

        return view('products.create', compact('product_categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();


        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/product');
            $validated['image'] = $image_address;
        }

        $product = Product::create($validated);


        return redirect(route('product.index'))->with('success', 'Product successfuly created');
    }

    public function edit(Product $product)
    {
        $product_categories = ProductCategory::all();

        return view('products.edit', compact('product', 'product_categories'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/product');
            $validated['image'] = $image_address;
        }

        $product->update($validated);

        return redirect(route('product.index'))->with('success', 'Product successfuly updated');
    }

    public function activateProduct(Product $product)
    {
        $product->activateProduct();

        return redirect(route('product.index'))->with('success', 'Product successfuly activated');
    }

    public function deactivateProduct(Product $product)
    {
        $product->deactivateProduct();

        return redirect(route('product.index'))->with('success', 'Product successfuly deactivated');
    }

    public function destroy(Product $product)
    {
        try {
            $product->destroy($product->id);
        } catch (Exception $exception) {
            return redirect(route('product.index'))->with('failure', 'Product Cannot be deleted');
        }

        return redirect(route('product.index'))->with('success', 'Product successfuly deleted');
    }
}
