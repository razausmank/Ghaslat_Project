<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
