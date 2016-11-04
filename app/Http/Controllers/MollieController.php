<?php

namespace App\Http\Controllers;

use App\Order;

use App\Property;
use Illuminate\Support\Facades\Mail;
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
        $ideal = $this->mollie->methods()->get('ideal');

        $date = new \DateTime();
        $date->modify('15 minutes');

        if ($date->format('Y-m-d H:i:s') < $order->created_at)
        {
            abort('404');
            exit;
        }

        return view('cart.show')
            ->with('order', $order)
            ->with('ideal', $ideal)
            ->with('issuers', $issuers);
    }

    public function create(Request $request)
    {
        $order = $this->order->find($request->order_id);

        $rules = [
            'order_id' => 'required',
            'voorwaarden' => 'required',
            'issuer_id' => $order->payment_method == 'ideal' ? 'required' : ''
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $payment =  $this->mollie->payments()->create([
            "amount"      => $order->total_price + $order->delivery_price,
            "description" => "Order Nr. ". $request->order_id,
            "redirectUrl" => route('order.get', $request->order_id),
            'metadata'    => array(
                'order_id' => $request->order_id,
            ),
            "method" => $order->payment_method,
            "issuer" => $order->payment_method == 'ideal' ? $request->issuer_id : '',
        ]);

        $order->payment_id = $payment->id;
        $order->status = self::STATUS_PENDING;

        $order->save();

//        Mail::send('emails.bedankt', ['order' => $order], function($m) use ($order){
//            $m->from('info@esigareteindhoven.com');
//            $m->to($order->email, $order->name)->subject('Bedankt voor uw bestelling!');
//        });

        return redirect($payment->getPaymentUrl());
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

//            Mail::send('emails.payment', ['order' => $order], function($m) use ($order){
//                $m->from('info@esigareteindhoven.com');
//                $m->to($order->email, $order->name)->subject('Bedankt voor uw bestelling!');
//            });
        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }

        $order->save();

        return view('cart.order')->with('order', $order)->with('payment', $payment);
    }

}
