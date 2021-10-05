<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens;
    use HasFactory;

    protected $appends = ['total_sum', 'total_orders'];

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'address'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function getTotalSumAttribute() {
        return number_format((float) $this->orders->sum('total_price'), 2, '.', '');
    }

    public function getTotalOrdersAttribute() {
        return $this->orders->count();
    }


}
