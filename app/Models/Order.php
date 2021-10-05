<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['sub_total', 'discount_in_money', 'vat_in_money', 'total_price' ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price')->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function syncProducts($products)
    {
        return $this->products()->sync($products);
    }

    public function getTotalPriceAttribute(){

        $total_amount = $this->sub_total  + $this->vat_in_money  - $this->discount_in_money;

        return number_format((float) $total_amount, 2, '.', '') ;
    }

    public function getVatInMoneyAttribute(){
        $vat_in_money = 0 ;
        if ( $this->vat ){
            $vat_in_money = ( ($this->sub_total  - $this->discount_in_money ) / 100) * $this->vat;
        }

        return number_format((float) $vat_in_money, 2, '.', '');
    }

    public function getDiscountInMoneyAttribute(){
        $discount_in_money= 0;
        if ($this->discount_type  == 'percent') {
            $discount_in_money = ( ( $this->sub_total / 100) * $this->discount_amount );
        } else if ($this->discount_type == 'money') {
            $discount_in_money = $this->discount_amount ;
        }
        return number_format((float) $discount_in_money, 2, '.', '');
    }

    public function getSubTotalAttribute(){
        $sub_total = $this->products->sum(function($t){
            return $t->pivot->price * $t->pivot->quantity;
        });

        return number_format((float) $sub_total, 2, '.', '');
    }


}
