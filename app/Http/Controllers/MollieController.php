<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $mollie;
    protected $order;

    public function __construct()
    {
        $this->mollie = Mollie::api();
        $this->order = new Order();
    }

    public function show($id){
        $order = $this->order->find($id);

        return view('cart.show')->with('order', $order);

    }


    public function create($id)
    {
        $order = $this->order->find($id);

        $payment =  $this->mollie->payments()->create([
            "amount"      => $order->total_price + $order->delivery_price,
            "description" => "My first API payment",
            "redirectUrl" => route('order.get', $id),
        ]);

        $order->payment_id = $payment->id;
        $order->status = self::STATUS_PENDING;

        $order->save();

        header("Location: " . $payment->getPaymentUrl());
        exit;
    }

    public function get($id)
    {
        $order = $this->order->find($id);

        $payment =  $this->mollie->payments()->get($order->payment_id);

        if ($payment->isPaid())
        {
            $order->status = self::STATUS_COMPLETED;
        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }

        $order->save();

        return view('cart.order')->with('order', $order)->with('payment', $payment);

    }

}
