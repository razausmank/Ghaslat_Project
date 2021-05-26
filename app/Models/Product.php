<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'created_by',
        'updated_by',
        'deleted_by',
        'product_category_id'
    ];


    // ORM relationships

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
