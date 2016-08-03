<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'naam', 'image', 'cate_id',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'categoryID');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'categoryID');
    }
}
