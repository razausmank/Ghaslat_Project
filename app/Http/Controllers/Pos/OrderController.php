<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Pos\Controller;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::where('is_active', 1)->get();
        $orders = Order::all() ;
        return view('pos.orders.create', compact('products', 'orders'));
    }

    public function store(Request $request)
    {


        $validated_attributes = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'vat' => ['required', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
            'discount_type' => ['nullable', 'in:percent,money'],
            'payment_option' => ['nullable', 'in:Pay Later,Pay By Cash,Pay By Card']
        ]);

        DB::beginTransaction();
        try {
        $items_array = [];
            foreach ($request->id  as $index => $item_id) {

                $item = Product::find($item_id);

                $items_array[$item->id] = [
                    'quantity' => $request->quantity[$index],
                    'price' => $item->price,
                ];
            }


        $order = Order::create($validated_attributes);
        $order->syncProducts($items_array);
        } catch (Exception $e) {
            return 'Sorry, Something went wrong';
            DB::rollBack();
        }
        DB::commit();

        return 'Order Created Succesfully';

    }

    public function show( Order $order ) {

        return $order->load('products', 'customer');
    }
}
