<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.index');
    }

    public function getCustomers(Request $request ){

        $start_date =  Carbon::create($request->year, $request->month);

        $end_date = (clone $start_date)->endOfMonth();


        $customers = Customer::with(['orders' => function($q) use($start_date, $end_date) {
            $q->where('created_at' , '>=' ,  $start_date->format('Y-m-d H:i:s'))
            ->where('created_at' , '<=' , $end_date->format('Y-m-d H:i:s')); // '=' is optional
        }])->get();

        $customers = $customers->sortByDesc('total_sum')->values()->take(10);
        return  ["data" => $customers ] ;
    }

    public function getOrders(Request $request) {

        if ( $request->month && $request->year )
        {
            $start_date =  Carbon::create($request->year, $request->month);

            $end_date = (clone $start_date)->endOfMonth();
            $orders = Order::where('created_at', '>=' ,$start_date->format('Y-m-d H:i:s'))->where('created_at', '<=' ,$end_date->format('Y-m-d H:i:s'))->take(10)->get();
        } else {
            $orders = Order::take(10)->get();

        }

        return ["data" => $orders ];
    }

    public function getData(Request $request) {
        $start_date =  Carbon::create($request->year, $request->month);
        $end_date = (clone $start_date)->endOfMonth();
        $newCustomers = Customer::where('created_at', '>=' ,$start_date->format('Y-m-d H:i:s'))->where('created_at', '<=' ,$end_date->format('Y-m-d H:i:s'))->count();
        $verified_customers= User::where('created_at', '>=' ,$start_date->format('Y-m-d H:i:s'))->where('created_at', '<=' ,$end_date->format('Y-m-d H:i:s'))->whereNotNull('customer_id')->where('is_active', 1)->count();
        $non_verified_customers=User::where('created_at', '>=' ,$start_date->format('Y-m-d H:i:s'))->where('created_at', '<=' ,$end_date->format('Y-m-d H:i:s'))->whereNotNull('customer_id')->where('is_active', 0)->count();
        $total_orders = Order::where('created_at', '>=' ,$start_date->format('Y-m-d H:i:s'))->where('created_at', '<=' ,$end_date->format('Y-m-d H:i:s'))->get();
        $total_orders_count = $total_orders->count();
        $total_orders_count_walk_in = $total_orders->where('order_mode', 'pos')->count();
        $total_orders_count_mobile = $total_orders->where('order_mode', 'mobile_app')->count();
        $total_orders_revenue = $total_orders->sum('total_price');
        $total_orders_revenue_walk_in = $total_orders->where('order_mode', 'pos')->sum('total_price');
        $total_orders_revenue_mobile = $total_orders->where('order_mode', 'mobile_app')->sum('total_price');
        $total_orders_delivered_orders = $total_orders->where('status', 'Delivered')->count();
        $total_orders_in_progress_orders = $total_orders->where('status', 'In Progress')->count();
        $total_orders_pending_orders = $total_orders->where('status', 'New Order')->count();
        return [
            'new_customers_count' => $newCustomers,
            'total_orders_count' => $total_orders_count,
            'total_orders_count_walk_in' => $total_orders_count_walk_in,
            'total_orders_count_mobile' => $total_orders_count_mobile,
            'total_orders_revenue' => number_format((float) $total_orders_revenue, 0, '.', ''),
            'total_orders_revenue_walk_in' => number_format((float) $total_orders_revenue_walk_in, 0, '.', ''),
            'total_orders_revenue_mobile' => number_format((float) $total_orders_revenue_mobile, 0, '.', ''),
            'total_orders_delivered_orders' => $total_orders_delivered_orders,
            'total_orders_in_progress_orders' => $total_orders_in_progress_orders,
            'total_orders_pending_orders' => $total_orders_pending_orders,
            'verified_customers' => $verified_customers,
            'non_verified_customers' => $non_verified_customers,

        ];
    }
}
