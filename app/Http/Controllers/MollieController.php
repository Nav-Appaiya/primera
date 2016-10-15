<?php

namespace App\Http\Controllers;

use App\Order;

use App\Property;
use Validator;

use Illuminate\Http\Request;

use Carbon\Carbon;

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
    protected $property;

    public function __construct()
    {
        $this->mollie = Mollie::api();
        $this->order = new Order();
        $this->property = new Property();
    }

    public function show($id)
    {
        $issuers =  $this->mollie->issuers()->all();

        $order = $this->order->find($id);

        $date = new \DateTime();
        $date->modify('15 minutes');

        if ($date->format('Y-m-d H:i:s') < $order->created_at)
        {
            abort('404');
            exit;
        }

        return view('cart.show')
            ->with('order', $order)
            ->with('issuers', $issuers);
    }

    public function create(Request $request)
    {
        $rules = [
            'order_id' => 'required',
            'issuer_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $order = $this->order->find($request->order_id);

        $payment =  $this->mollie->payments()->create([
            "amount"      => $order->total_price + $order->delivery_price,
            "description" => "Order Nr. ". $request->order_id,
            "redirectUrl" => route('order.get', $request->order_id),
            'metadata'    => array(
                'order_id' => $request->order_id,
            ),
            "method" => 'ideal',
            "issuer" => $request->issuer_id,
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
            if ($order->status != 'paid'){
                foreach($order->orderItems as $product){
                    $new_stock = (int)$product->property->stock - $product->amount;
                    $this->property->where('id', $product->property_id)
                        ->update(array('stock' => $new_stock));
                }
            }
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
