<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $producten = [];
        $user = $request->user();
        $cart = $request->session()->flush();
        dd($cart);
        foreach ($cart as $cartItem) {
            if(!$cartItem instanceof Product){
                $item = Product::find($cartItem);
            }
            
            $total =+ $item->price;
            $producten[] = $item;
        }
        
        return view('main.checkout', [
            'user' => $user,
            'cart' => $cart,
            'producten' => $producten,
            'total'=> $total
        ]);
    }

    public function store(Request $request)
    {
        
    }

//    /**
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function testSendGridEmail(Request $request)
//    {
//        
//        $user = User::find(1);
//        $order = Order::find(1); 
//        $items = $request->session()->get('cart.items');
//        $payment = Mollie::api()->payments()->get('tr_pE63wryDFj');
//        
//        Mail::send('emails.payment', [
//            'user' => $user,
//            'order' => $order,
//            'payment' => $payment,
//            'items' => $items
//        ], function ($message)
//        {
//            $message->from('me@gmail.com', 'Christian Nwamba');
//            $message->to('chrisn@scotch.io');
//        });
//
//        return response()->json(['message' => 'Request completed']);
//    }
}
