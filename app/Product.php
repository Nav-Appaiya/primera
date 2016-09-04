<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    protected $fillable = [
//        'naam', 'image', 'categoryID',
    ];

//    /**
//     * Product constructor.
//     */
//    public function __construct()
//    {
//    }

    public function seotags()
    {
        return $this->hasMany('App\Seotags');
    }

    public function productimages()
    {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

//    public function categories()
//    {
//        return $this->hasMany('App\Category', 'id', 'category_id');
//    }

//    public function category()
//    {
//        return $this->hasMany('App\Category', 'categoryID');
//    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function property()
    {
        return $this->hasMany('App\Property', 'product_id');
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
