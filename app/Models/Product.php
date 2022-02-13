<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['product_category'] ;


    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'created_by',
        'updated_by',
        'product_category_id',
        'is_package',
        'is_active'
    ];


    public function activateProduct()
    {
        $this->is_active = 1;
        $this->save();
    }


    public function deactivateProduct()
    {
        $this->is_active = 0;
        $this->save();
    }
    // ORM relationships

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
