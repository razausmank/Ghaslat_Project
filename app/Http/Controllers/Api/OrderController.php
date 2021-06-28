<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // expected input
    // "_token" => "qFTeNL0NbnxULiLUTXXt3uCMpwwQwHqJirCuPKHd"
    // "_method" => "POST"
    // "address" => "asdasd"
    // "customer_id" => "2"
    // "items_list" => array:2 [
    //     0 => array:2 [
    //     "product_id" => "1"
    //     "product_qty" => "1"
    //     ]
    //     1 => array:2 [
    //     "product_id" => "15"
    //     "product_qty" => "2"
    //     ]
    // ]

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'items_list' => 'required',
        ]);

        list($product_ids, $product_qunatities) = $this->destructureTwoDimArrayToSeperateArrays(request('items_list'), 'product_id', 'product_qty');

        unset($validated['items_list']);

        $validated['customer_id'] = auth()->user()->customer_id;

        $order = Order::create($validated);

        $order->syncProducts($product_ids, $product_qunatities);

        return $order;
    }

    public function show($id)
    {
        $order = Order::where('customer_id', auth()->user()->customer_id)->where('id', $id)->get();
        return $order;
    }

    public function index()
    {
        $orders = Order::where('customer_id', auth()->user()->customer_id)->get();
        return $orders;
    }
}
