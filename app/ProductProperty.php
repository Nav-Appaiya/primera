<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = 'product_property';

//    protected $fillable = [
//        'name'
//    ];\

//    public function property()
//    {
//        return $this->hasMany('App\Property');
//    }

    public function koppelproductproperty()
    {
        return $this->hasMany('App\KoppelProductProperty');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
