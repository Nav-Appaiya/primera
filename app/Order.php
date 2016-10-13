<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Order extends Model
{
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function mailUserPayedOrder($user, $order, $payment, $items)
    {

        return Mail::send('emails.payment', [
            'user' => $user,
            'order' => $order,
            'payment' => $payment,
            'items' => $items,
            'total' => Session::get('cart.total')
        ], function ($m) use ($user) {
            $m->from('info@esigarett.nl', 'Primera Eindhoven(esigarett.nl)');

            $m->to($user->email, $user->voornaam)
                ->subject('Betaling gelukt!');
        });

    }
}
