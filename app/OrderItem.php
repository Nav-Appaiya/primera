<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    public function order()
    {
        return $this->hasOne('App\Order');
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }


    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
