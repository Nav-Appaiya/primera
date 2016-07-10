<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $session = Session::get('cart', array());
        $total = 0;

        header('Content-Type: text/plain');

        $total = 0;
        if (isset($session['item'])) {
            foreach ($session['item'] as $item) {
                $total += $item->price;
            }
        }

        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $session,
            'total' =>$total
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $session = $request->session();
        $product = Product::find($id);

        if($product){
            $request->session()->push('cart.item', $product);
        }

        $cart = $request->session()->get('cart', []);
        header('Content-Type: text/plain');

        $total = 0;
        foreach ($cart['item'] as $item) {
            $total += $item->price;
        }

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
    }
}
