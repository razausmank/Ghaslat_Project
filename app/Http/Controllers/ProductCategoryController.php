<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::all();

        return view('product_categories.index', compact('product_categories'));
    }

    public function show(ProductCategory $productcategory)
    {
        return view('product_categories.show', compact('productcategory'));
    }

    public function create()
    {
        return view('product_categories.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/product_category');
            $validated['image'] = $image_address;
        }

        ProductCategory::create($validated);


        return redirect(route('productcategory.index'))->with('success', 'Product Category successfuly created');
    }

    public function edit(ProductCategory $productcategory)
    {
        return view('product_categories.edit', compact('productcategory'));
    }

    public function update(ProductCategory $productcategory, ProductCategoryRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/product_category');
            $validated['image'] = $image_address;
        }

        $productcategory->update($validated);

        return redirect(route('productcategory.index'))->with('success', 'Product Category successfuly updated');
    }

    public function destroy(ProductCategory $productcategory)
    {
        try {
            $productcategory->destroy($productcategory->id);
        } catch (Exception $exception) {
            return redirect(route('productcategory.index'))->with('failure', 'Product Category Cannot be deleted, the Category has products');
        }

        return redirect(route('productcategory.index'))->with('success', 'Product Category successfuly deleted');
    }
}
