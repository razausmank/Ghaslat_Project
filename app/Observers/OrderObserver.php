<?php

namespace App\Observers;

use App\Helpers\Helper;

class OrderObserver
{
    public function created($model)
    {
        $model->order_number = $model->id ."00";
        $model->order_number .= Helper::generateRandomString( 8 - strlen($model->order_number) );
        $model->save();
    }
}
