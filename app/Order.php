<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function mailUserPayedOrder($user)
    {
        $mail = mail($user->email, 'Order is betaald!', 'Bedankt voor betalen!');
        var_dump($mail);
    }
}
