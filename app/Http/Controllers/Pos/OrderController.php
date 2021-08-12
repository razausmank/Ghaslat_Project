<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Pos\Controller;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::where('is_active', 1)->get();
        return view('pos.orders.create', compact('products'));
    }

    public function store(Request $request)
    {

        $validated_attributes = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'vat' => ['required', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
            'discount_type' => ['nullable', 'in:percent,money'],
            'payment_option' => ['nullable', 'in:pay later,pay by cash,pay by card']
        ]);

        $order = Order::create($validated_attributes);

        return "order created successfully";
    }
}
