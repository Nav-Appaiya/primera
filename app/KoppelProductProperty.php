<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoppelProductProperty extends Model
{
    public function productproperty()
    {
        return $this->hasMany('App\ProductProperty');
    }

    public function property()
    {
        return $this->hasMany('App\Property');
    }
}
