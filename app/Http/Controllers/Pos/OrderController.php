<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Pos\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::where('is_active', 1)->get();
        $orders = Order::all() ;
        $customers = Customer::get();
        return view('pos.orders.create', compact('products', 'orders', 'customers'));
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

        if ($request->payment_received)
        {
            $validated_attributes['payment_received'] = true ;
        }

        $order = Order::create($validated_attributes);
        $order->syncProducts($items_array);

        if ( $order->payment_received){
            $transaction = Transaction::create([
                'order_id' => $order->id ,
                'payment_received_by' => auth()->user()->id,
            ]);
        }

        } catch (Exception $e) {
            return 'Sorry, Something went wrong';
            DB::rollBack();
        }
        DB::commit();

        return 'Order Created Succesfully';

    }

    public function getBasicPosData(){
        $orders = Order::with('customer')->get() ;
        return [
            'orders' => $orders,
        ] ;
    }

    public function show( Order $order ) {

        return $order->load('products', 'customer');
    }

    public function orderUpdate ( Request $request )
    {
        $order = Order::findOrFail($request->id);
        $order->update([
            'payment_option' => $request->payment_type,
            'status' => $request->status,
            'payment_received' => $request->payment_received ? 1 : 0
        ]);

        if ( $request->payment_received == "1" )
        {
            Transaction::updateOrCreate(['order_id' => $order->id ], ['payment_received_by' => auth()->user()->id ]);
        }else if ( $request->payment_received == "0" ) {
            Transaction::where('order_id', $order->id)->delete();
        }
        return "Order Successfully Updated" ;
    }
}
