<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
