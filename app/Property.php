<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public $timestamps = false;

    public function koppelproductproperty()
    {
        return $this->belongsTo('App\ProductProperty');
    }
}
