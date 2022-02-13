<?php

namespace App\Observers;

use App\Helpers\Helper;
use App\Models\OrderLog;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    public function created($model)
    {
        $model->order_number = $model->id ."00";
        $model->order_number .= Helper::generateRandomString( 8 - strlen($model->order_number) );
        $model->saveQuietly();

        $orderLog =  OrderLog::create([
            'status' => 'New Order',
            'payment_option' => $model->payment_option,
            'payment_received' => $model->payment_option == 'Pay Later' ? 0 : 1 ,
            'order_id' => $model->id,
        ]);


    }

    public function updated($model)
    {


        OrderLog::create([
            'status' => $model->status,
            'payment_option' => $model->payment_option,
            'payment_received' => 0,
            'order_id' => $model->id,
        ]);
    }
}
