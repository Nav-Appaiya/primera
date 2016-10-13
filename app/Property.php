<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function detail()
    {
        return $this->belongsTo('App\Details', 'detail_id');
    }

    public function orderitem()
    {
        return $this->hasMany('App\OrderItem', 'order_id');
    }


}
