<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function productproperty()
    {
        return $this->belongsTo('App\ProductProperty');
    }
}
