<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
        $session = Session::get('cart', array());
        $total = 0;

        header('Content-Type: text/plain');

        $total = 0;
        if (isset($session['item'])) {
            foreach ($session['item'] as $item) {
                $total += $item->price;
            }
        }
=======
        $cart = $request->session()->get('cart.items', array());
>>>>>>> 133ccbe2147ca08cbc5c70c6d5f4b0d7f43f32af

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
        header('Content-Type: text/plain');

        $session = $request->session();
        $product = Product::find($id);

        if($product){
            $session->push('cart.items', $product);
        }

        $cart = $session->get('cart.items', []);

        return redirect()->action('CartController@index', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $cart,
            'total' => $this->getTotal($request)
        ]);
    }

    public function removeCart(Request $request, $id)
    {
        header('Content-Type: text/plain');
        $session = $request->session();
        $cartItems = $session->get('cart.items');

        $collect = array();
        foreach ($cartItems as $item) {
            if ($item == $id){
                $session->forget('cart.items', $item);
            }
            $collect[] = $item->id;
        }

<<<<<<< HEAD
        return Redirect::to('cart');
    }

    public function removeCart(Request $request, $id)
    {
        $session = $request->getSession()->get('cart');
        $total = 0;
        foreach ($session['item'] as $item) {
            $total += $item->price;
        }
        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $session,
            'total' => $total
        ]);
    }

    public function clearCart(Request $request)
    {
        $session = $request->session()->get('cart');
        $request->session()->clear();
        $request->session()->flush();
        $request->session()->forget('cart');

        return Redirect::to('cart');
=======


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
>>>>>>> 133ccbe2147ca08cbc5c70c6d5f4b0d7f43f32af
    }
}
