<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;


    protected $guarded = [];

    // protected $touches = ['roles'];


    // A persmission can belong to many roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
