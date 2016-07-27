<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = 'product_property';

    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];
    public function property()
    {
        return $this->hasMany('App\Property');
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
