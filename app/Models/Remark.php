<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remark extends Model
{
    use HasFactory;
    use SoftDeletes ;

    protected $fillable = [
        'description',
        'entity_id',
        'entity_type_id',
        'created_by',
        'updated_by',
        'deleted_by',

    ];


    public function entity_type()
    {
        return $this->belongsTo( EntityType::class );
    }

}
