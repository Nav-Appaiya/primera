<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Validator;

use App\CreditOrder;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $order;

    public function __construct()
    {
        $this->order = new CreditOrder();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index')->with('orders', $this->order->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.orders.edit')->with('order', $this->order->find($id));
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
        $messages = [];
        $rules = [
            'status'          => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_orders_edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $order = $this->order->find($id);

        $order->status =  $request->status;
        $order->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_orders_edit', $id);
    }

}
