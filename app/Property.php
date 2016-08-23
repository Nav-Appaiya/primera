<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function koppelproductproperty()
    {
        return $this->belongsTo('App\ProductProperty');
    }
}
