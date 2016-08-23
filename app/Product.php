<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

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
        return $this->hasMany('App\ProductImage', 'productID');
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
        return $this->belongsTo('App\Category');
    }

//    public function properties()
//    {
//        return $this->hasMany('App\ProductProperty', 'ProductID');
//    }

    public function orderedproducts()
    {
        return $this->hasMany('App\ProductProperty');
    }
}
