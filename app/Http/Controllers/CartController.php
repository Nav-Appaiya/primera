<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $session = Session::get('cart');
        if($session == NULL){
            $session['item'][] = array();
        }

        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $session
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $stuff = Session::get('cart');

        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all(),
            'cart' => $stuff
        ]);
    }
}
