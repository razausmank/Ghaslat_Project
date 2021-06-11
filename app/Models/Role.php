<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $touches = ['permissions'];


    // A role can have many Permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    // Allow a role to have a permission
    public function syncPermissions($permission)
    {
        return $this->permissions()->sync($permission);
    }
}
