<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{

    private $order;
    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->order = new Order();
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate();

        return view('admin.orders.all', compact('orders'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
//            'value' => 'required|unique:details,value',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_property_create')
                ->withErrors($validator)
                ->withInput();
        }

        $order = $this->order;

        $order->user_id = $request;
        $order->postcode = $request;
        $order->adres = $request;
        $order->huisnummer = $request;
        $order->woonplaats = $request;
        $order->status = $request;
        $order->delivery_type = $request;
        $order->delivery_price = $request;
        $order->payment_id = $request;
        $order->notification = $request;

        $order->save();


        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_property_index');


//        $rules = array(
//            'name'       => 'required',
//            'email'      => 'required|email',
//            'password' => 'required|numeric'
//        );
//        $validator = \Illuminate\Support\Facades\Validator::make(\Illuminate\Support\Facades\Input::all(), $rules);
//
//        // process the login
//        if ($validator->fails()) {
//            return Redirect::to('orders/create')
//                ->withErrors($validator)
//                ->withInput(\Illuminate\Support\Facades\Input::except('password'));
//        } else {
//            // store
//            $order = new Order();
//            $order->user_id = 1;
//            $order->shipping_address       = \Illuminate\Support\Facades\Input::get('name');
//            $order->billing_address      = \Illuminate\Support\Facades\Input::get('email');
//            $order->status = \Illuminate\Support\Facades\Input::get('password');
//            $order->save();
//
//            // redirect
//            Session::flash('message', 'Successfully created nerd!');
//            return view('admin.orders.all', [
//                'orders' => Order::all()
//            ]);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        // show the edit form and pass the nerd
        return view('admin.orders.edit', [
            'order' => $order
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
