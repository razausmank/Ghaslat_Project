<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class OrderProductObserver
{
    public function created($model)
    {
        $product_price = Product::find($model->product_id)->price;
        $model->update(["price" => $product_price]);
    }

    public function updated($model)
    {
        $product_price = Product::find($model->product_id)->price;
        $model->update(["price" => $product_price]);
    }
}
