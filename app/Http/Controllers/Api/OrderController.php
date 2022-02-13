<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    // expected input
    // "_token" => "qFTeNL0NbnxULiLUTXXt3uCMpwwQwHqJirCuPKHd"
    // "_method" => "POST"
    // "address" => "asdasd"
    // "customer_id" => "2"
    // "items_list" => array:2 [
    //     0 => array:2 [
    //     "item_id" => "1"
    //     "item_qty" => "1"
    //     ]
    //     1 => array:2 [
    //     "item_id" => "15"
    //     "item_qty" => "2"
    //     ]
    // ]

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'items_list' => 'required',
            'pickup_time' => 'nullable',
            'dropoff_time' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'credit_card_last_digits' => 'nullable',
            'payment_reference_number' => 'nullable',
            'special_request' => 'nullable',
        ]);

        DB::beginTransaction();
        try {

            $items_array = [];
            foreach (request('items_list') as $item_list) {

                $item = Product::find($item_list['item_id']);

                $items_array[$item->id] = [
                    'quantity' => $item_list['item_qty'],
                    'price' => $item->price,
                ];
            }
            unset($validated['items_list']);


            $validated['customer_id'] = auth()->user()->customer_id;
            $validated['order_mode'] = "mobile_app";
            $validated['vat'] = 5.0;

            $order = Order::create($validated);

            $order->syncProducts($items_array);
            DB::commit();
        } catch (Exception $e) {
            return response(['message' => 'Invalid Data'], 422);
            DB::rollBack();
        }

        return Helper::customResponse( 201 , "Order created Successfuly", $order, true);

    }

    public function show($id)
    {
        $order = Order::where('customer_id', auth()->user()->customer_id)->where('id', $id)->get();

        return Helper::customResponse( 200 , "Order Retrieved Successfuly", $order, true);

    }

    public function index()
    {
        $limit = request('limit') ?? Null;
        $page = request('page') ?? Null;

        $ordersCount = Order::where('customer_id', auth()->user()->customer_id)->count();

        $orders = Order::where('customer_id', auth()->user()->customer_id)->when($limit !== Null && $page !== Null, function ($query) use ($limit, $page) {
            return $query->skip(($page - 1) * $limit)->take($limit);
        })->get();

        return Helper::customResponse( 200 , "Orders Retrieved Successfuly", $orders, true, $ordersCount);

    }
}
