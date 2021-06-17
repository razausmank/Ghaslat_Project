<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function syncProducts($products, $quantities)
    {
        foreach ($products as $index => $product) {
            $product_quantity_array[$product] = ['quantity' => $quantities[$index]];
        }

        return $this->products()->sync($product_quantity_array);
    }
}
