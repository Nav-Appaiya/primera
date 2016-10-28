<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    const STATUS_VERZONDEN = 'verzonden';
    const STATUS_ = 'verzonden';

    protected $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.orders.index')->with('orders', $this->order->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-panel.admin..orders.edit')->with('order', $this->order->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'track_trace' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_order_edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $order = $this->order->find($id);

        $order->status =  SELF::STATUS_VERZONDEN;
        $order->track_trace =  $request->track_trace;
        $order->save();

//        Mail::send('emails.delivery_status', ['orders' => $order], function ($message) use ($order)
//        {
//            $message->from('noreply@esigareteindhoven.com', 'test mail');
//
//            $message->to($order->email);
//        });

        \Session::flash('succes_message','successfully.');

//        return view('emails.delivery_status')->with('order', $order);
        return redirect()->route('admin_order_index');
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request, $id)
//    {
//        $rules = [
//            'value'          => 'required|unique:details,value',
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return redirect()
//                ->route('admin_order_edit', $id)
//                ->withErrors($validator)
//                ->withInput();
//        }
////
////        $details = $this->detail;
////
////        $details->type = $request->type;
////        $details->value = $request->value;
////
////        $details->save();
////
////
//        \Session::flash('succes_message','successfully.');
////
//        return redirect()->route('admin_order_edit', $id);
//    }

}
