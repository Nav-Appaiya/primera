<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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

    public function mailUserPayedOrder($user, $order)
    {
        Mail::send('emails.payment', [
            'user' => $user,
            'order' => $order->toJson()
        ], function ($m) use ($user) {
            $m->from('info@esigarett.nl', 'Primera Eindhoven(esigarett.nl)');

            $m->to($user->email, $user->voornaam)
                ->subject('Betaling gelukt!');
        });

    }
}
