<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart.items', array());

        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $cart,
            'total' => $this->getTotal($request)
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $request->session()->push('cart.items', $id);
        $request->session()->flash('status', 'Het product is toegevoegd aan je winkelwagentje!');

        return Redirect::back();
    }

    public function removeCart(Request $request, $id)
    {
        $session = $request->session();
        $cartItems = $session->get('cart.items');

        foreach ($cartItems as $key => $cartItem) {
            if($cartItem->id == $id){
                $session->forget('cart.items.'.$key);
            }
        }

        return redirect()->action('CartController@index', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $cartItems,
            'total' => $this->getTotal($request)
        ]);
    }

    private function getTotal(Request $request)
    {
        $cartItems = $request->session()->get('cart.items');

        $total = 0;
        if(count($cartItems) !== 0){
            foreach ($cartItems as $cartItem) {
                $total += $cartItem->price;
            }
        }

        return $total;
    }
}
