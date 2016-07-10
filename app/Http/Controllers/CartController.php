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
