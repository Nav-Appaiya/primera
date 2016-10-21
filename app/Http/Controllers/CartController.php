<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

//use App\Cart;
use App\Order;
use App\OrderItem;
use App\Property;

use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;

use Session;
use Redirect;
use Validator;
use Cart;

use Illuminate\Http\Request;
use App\Http\Requests;

class CartController extends Controller
{
    public function __construct()
    {
        $this->product = new Property();
        $this->mollie = Mollie::api();
    }

    public function index()
    {
        $cart = Cart::content();

        return view('cart.index', ['cart' => $cart, 'product' => $this->product]);
    }

    public function add(){

        $rules = [
            'product_id' => 'required'
        ];

        $validator = Validator::make(Request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product_id = Request()->get('product_id');
        $product = $this->product->find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->product->name, 'qty' => 1, 'options' => [$product], 'price' => ($product->product->price - $product->product->discount)));

        return redirect()->route('cart');
    }

    public function remove(){
        $rowId = Cart::search(array('id' => Request()->get('product_id')));
        Cart::remove($rowId[0]);

        return redirect()->route('cart');
    }

    public function decrease(){
        $rowId = Cart::search(array('id' => Request()->get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);

        return redirect()->route('cart');
    }

    public function increase(){
        $rowId = Cart::search(array('id' => Request()->get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 1);

        return redirect()->route('cart');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart');
    }

    public function edit()
    {
        $methods = $this->mollie->methods()->all();
        return view('cart.checkout')
            ->with('user', Auth::user())
            ->with('methods', $methods);
    }

    public function check(Request $request)
    {
        $rules = [
            'levering' => 'required',
            'voornaam' => 'required|max:50|alpha',
            'achternaam' => 'required|max:50|regex:/^[\pL\s]+$/u',
            'geslacht' => 'in:man,vrouw',
            'geboortedatum' => 'required|date',
            'adres' => 'required|max:70|regex:/^[\pL\s]+$/u',
            'huisnummer' => 'required|max:7|alpha_num',
            'postcode' => 'required|alpha_num|min:6',
            'woonplaats' => 'required|max:50|alpha',
            'telMobiel' => 'numeric|digits_between:10,10',
            'telThuis' => 'numeric|digits_between:10,11'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('cart.checkout')
                ->withErrors($validator)
                ->withInput();
        }

        $order = new Order();

        if($request->levering == 'verzenden')
        {
            if (Cart::total() >= env('FREE_SHIPPING_FORM'))
            {
                $shipping_price = env('PACKAGE_GET_PRICE');
            }else{
                $shipping_price = $request->levering == 'verzenden' ? env('PACKAGE_POST_PRICE') : env('PACKAGE_GET_PRICE');
            }
        }else{
            $shipping_price = env('PACKAGE_GET_PRICE');
        }

        $order->user_id = Auth::user()->id;
        $order->email = Auth::user()->email;
        $order->status = 'open';
        $order->total_price = Cart::total();
        $order->name = $request->voornaam.' '.$request->achternaam;
        $order->delivery_type = $request->levering;
        $order->delivery_price = $shipping_price;
        $order->adres = $request->adres;
        $order->huisnummer = $request->huisnummer;
        $order->postcode = $request->postcode;
        $order->woonplaats = $request->woonplaats;

        $order->save();

        foreach (Cart::content() as $item){
            $property = $this->product->find($item->id);
            $array[] = [
                'property_id' => $property->id,
                'order_id' => $order->id,
                'selling_price' => $property->product->price - $property->product->discount,
                'amount' => $item['qty']
            ];
        }

        OrderItem::insert($array);

        Cart::destroy();

        return redirect()->route('order.show', $order->id);
    }

}
