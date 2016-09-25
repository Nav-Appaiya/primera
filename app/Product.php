<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    protected $fillable = [
    ];

    public function seotags()
    {
        return $this->hasMany('App\Seotags');
    }

    public function productimages()
    {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function property()
    {
        return $this->hasMany('App\Property');
    }

    public function review()
    {
        return $this->hasMany('App\Review', 'product_id', 'id');
    }

    public function orderedproducts()
    {
        return $this->hasMany('App\ProductProperty');
    }
}
