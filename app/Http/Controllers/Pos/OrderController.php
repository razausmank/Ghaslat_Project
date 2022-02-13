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

        if ($request->payment_option != 'Pay Later')
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
            return $e ;
            return 'Sorry, Something went wrong';
            DB::rollBack();
        }
        DB::commit();

        return  [ 'order_id' => $order->id , 'message' =>  'Order Created Succesfully'] ;

    }

    public function getBasicPosData(Request $request){
        if ( $request->filter == "new" ){
            $orders = Order::where('status', 'New Order')->with('customer')->get() ;

        }else if ($request->filter == "in_progress") {
            $orders = Order::where('status', 'In Progress')->with('customer')->get() ;

        }else if ($request->filter == "ready_for_delivery") {
            $orders = Order::where('status', 'Waiting For Delivery')->with('customer')->get() ;

        }else if ($request->filter == "ready_for_pickup") {
            $orders = Order::where('status', 'Waiting For Pickup')->with('customer')->get() ;

        }else {
            $orders = Order::where('status', '!=', 'Cancelled')->where('status', '!=', 'Delivered')->with('customer')->get() ;
        }

        $new_orders_count = Order::where('status', 'New Order')->count() ;
        $in_progress_orders_count =  Order::where('status', 'In Progress')->count()  ;
        $waiting_for_delivery_orders_count = Order::where('status', 'Waiting For Delivery')->count() ;
        $waiting_for_pickup_orders_count =  Order::where('status', 'Waiting For Pickup')->count()  ;
        $all_orders_count = Order::where('status', '!=', 'Cancelled')->count() ;

        return [
            'orders' => $orders,
            'new_orders_count' => $new_orders_count,
            'in_progress_orders_count' => $in_progress_orders_count,
            'waiting_for_delivery_orders_count' => $waiting_for_delivery_orders_count,
            'waiting_for_pickup_orders_count' => $waiting_for_pickup_orders_count,
            'all_orders_count' => $all_orders_count,
        ] ;
    }

    public function show( Order $order ) {

        return $order->load('products', 'customer','order_logs');
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

    public function searchOrder( Request $request ){
        $order = Order::where('order_number', $request->order_number)->first() ;
        return $order ? $order->load('products', 'customer', 'order_logs') : null ;
    }
}
