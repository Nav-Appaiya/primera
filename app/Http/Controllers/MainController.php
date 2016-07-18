<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Pages;

use App\Http\Requests;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;


class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $pages = Pages::all();

        return view('main.index',[
            'products' => $products,
            'categories' => $categories,
            'pages' => $pages
        ]);
    }

    public function category($id)
    {
        $categories = Category::all();
        $pages = Pages::all();
        $category = Category::find($id);

        return view('main.category', [
            'category' => $category,
            'categories' => $categories,
            'pages' => $pages
        ]);
    }

    public function page($pageId)
    {
        $page = Pages::where('name', $pageId)->first();

        return view('main.page', [
            'page' => $page,
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all()
        ]);
    }

    

    

    public function testing(Request $request)
    {
        header('Content-Type: text/plain');
        $products = Product::find(1124);
        $sessionCart = $request->getSession()->get('cart.items');

//        $request->session()->forget('cart.items', $products);
        exit;
        $session = $request->session();
        $cart = $session->get('cart.items');
        $count = count($session->get('cart.items'));


        foreach ($cart as $item) {
            $session->forget('cart.items', $item);
        }

        var_dump($cart);

        $user = Auth::check();
        print_r($user);

        exit;
    }
    
    /**
     * @throws \Mollie_API_Exception
     */
    public function mollietesting()
    {
        $payment = Mollie::api()->payments()->create([
            "amount"      => 10.00,
            "description" => "Bestelling",
            "redirectUrl" => "http://localhost:8000/test",
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        if ($payment->isPaid())
        {
            echo "Payment received.";
        }
        header('Content-Type: text/plain');
        print_r($payment->getPaymentUrl());exit;
    }

    public function categories()
    {
        return view('main.category', [
            'category' => Category::find(1)
        ]);
    }

    public function payment()
    {
        $items = Session::get('cart.items');
        $total = 0.00;
        foreach ($items as $item) {
            $total += $item->price;
        }

        $payment = Mollie::api()->payments()->create([
            "amount"      => $total,
            "description" => "e-sigarett Primera",
            "redirectUrl" => "http://localhost:8000/order/payment",
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        return redirect($payment->getPaymentUrl());

    }

    public function payed(Request $request, $id)
    {
        var_dump($id);exit;
        header('Content-Type: text/plain');
        print_r($request->all());exit;
    }

    public function carting(Request $request){
        header('Content-Type: text/plain');
        echo 'Products in session: ' .  count($request->session()->get('cart.items')) . PHP_EOL . PHP_EOL;
        $session = $request->session();
        $items = $request->session()->get('cart.items');

        $remove = 869;

        foreach ($items as $item) {
            if($item->id === $remove){
                $pulled = $session->pull('cart.items', '312');
                var_dump($pulled);exit;
            }
        }

        exit;
    }

    public function voorwaarde()
    {
        return view('main.voorwaarde');
    }

    public function about()
    {
        return view('main.about');
    }

    public function policy()
    {
        return view('main.policy');
    }

    public function verzending()
    {
        return view('main.verzending');
    }

    public function cookie()
    {
        return view('main.cookie');
    }

    public function checkout(Request $request)
    {
        $customer = new User();
        $cart = Session::get('cart');

        $total = 0;
        foreach ($cart['items'] as $item) {
            $total += $item->price;
        }

        Session::set('cart.total', $total);

        if($request->isMethod('POST')){

            $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|min:3',
                'street' => 'required|',
                'postcode' => 'required|min:5',
                'plaats' => 'required|min:5',
                'birthdate' => 'required',
                'phone_home' => 'required|min:8',
                'phone_mobile' => 'required|min:8',
                'email' => 'required|email'
            ]);

            $user = new User();
            $user->email = $request->get('email');
            if(strtolower($request->get('email')) == 'navarajh@gmail.com'){
                $user->email = 'navarajh+' . mt_rand(0,10000) . '@gmail.com';
            }
            $user->voornaam = $request->get('first_name');
            $user->achternaam = $request->get('last_name');
            $user->voorletters = strtoupper(substr($request->get('first_name'), 0, 1));
            $user->geboortedatum = $request->get('birthdate');
            $user->adres = $request->get('street');
            $user->postcode = $request->get('postcode');
            $user->woonplaats = $request->get('plaats');
            $user->telMobiel = $request->get('phone_mobile');
            $user->telThuis = $request->get('phone_home');

            if($user->save()){

                $order = new Order();
                $order->user_id = $user->id;
                $order->shipping_address = $user->adres . ', ' . $user->postcode . ', ' . $user->woonplaats;
                $order->billing_address = $user->adres . ', ' . $user->postcode . ', ' . $user->woonplaats;
                $order->amount = $total;
                $order->status = 'awaiting payment';
                $order->save();

                $payment = Mollie::api()->payments()->create([
                    "amount"      => $total,
                    "description" => "Betaling aan primera t.a.v E-Sigarett.nl",
                    "redirectUrl" => "http://localhost:8000/order/payment/" . $order->id,
                ]);

                $order->status = $payment->status;
                $order->payment_id = $payment->id;
                $order->save();

                return redirect($payment->getPaymentUrl());
            }
        }

        return view('main.checkout', [
            'customer' => $customer,
            'cart' => $cart
        ]);
    }

    public function checkoutPayment(Request $request)
    {
        header('Content-Type: text/plain');
        print_r($request->all());exit;
    }
}
