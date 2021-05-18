<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes ;

    protected $fillable = [
        'name',
        'url',
        'description',
        'sort_order',
        'parent_page_id',
        'created_by',
        'updated_by',
        'deleted_by',

    ];


    // START FOR JS TREE
    protected $maps = ['text' => 'name', 'children' => 'sub_pages'];

    protected $hidden = ['name', 'sub_pages'] ;


    protected $appends = [ 'text' ,'children'] ;

    public function getTextAttribute()
    {
        return $this->name;
    }

    public function getChildrenAttribute(){
        return $this->sub_pages ;
    }
    //END FOR JS TREE


    // relationships with the table itself to loop over the pages and subpages
    public function pages()
    {
        return $this->hasMany(Page::class, 'parent_page_id');
    }

    public function sub_pages()
    {
        return $this->hasMany(Page::class, 'parent_page_id')->with('pages');
    }

    //ORM relationships

    public function users()
    {
        return $this->belongsToMany( User::class )->withTimestamps();
    }
}
