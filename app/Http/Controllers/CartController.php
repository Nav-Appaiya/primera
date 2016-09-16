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
        $cart = $request->session()->get('cart.items');
        $products = [];
        $total = 0;
        
        if(count($cart) >= 1){
            foreach ($cart as $item) {
                if(!$item instanceof Product){
                    $item = Product::find($item);
                }
                $price = $item->price;
                $total += $price;
                $products[] = $item;
            }
        }

        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => $products,
            'cart' => $cart,
            'total' => $total
        ]);
    }

    // Toevoegen middels post request POST: /cart/add [product[props]]
    public function addCart(Request $request)
    {
        $product = json_decode($request->get('product'));
        $id = $product->id;
        $request->session()->push('cart.items', $id);
        $request->session()->flash('status', 'Het product is toegevoegd aan je winkelwagentje!');

        return Redirect::back();
    }

    public function removeCart(Request $request, $id)
    {
        //  Bij meerdere items moet er 1 verwijderd worden uit de cart.items
        $pulled = $request->session()->pull('cart.items', $id);

        if(count($pulled) > 1){
            // more than 1 in cart, add remaining back
            foreach ($pulled as $key => $value) {
                if($key==0) continue;
                $request->session()->push('cart.items', $value);
            }
        }

        $request->session()->flash('status', 'Het product is verwijderd uit je winkelwagentje!');

        return Redirect::back();
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
