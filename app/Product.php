<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Nicolaslopezj\Searchable\SearchableTrait;


class Product extends Model
{
    use SearchableTrait;

    protected $table = 'products';

    protected $guarded = ['id'];

    protected $fillable = [
    ];

    protected $searchable = [
        'columns' => [
            'products.id' => 4,
            'products.name' => 3,
            'products.price' => 2,
            'products.discount' => 1,
        ],
//        'joins' => [
//            'profiles' => ['users.id','profiles.user_id'],
//        ],
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
