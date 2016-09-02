<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderItem;
use App\Pages;

use App\Http\Requests;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Mollie\Laravel\Facades\Mollie;


class MainController extends Controller
{
    public function index()
    {
        $products = Product::with('productimages')->get();
        $categories = Category::all();
        $pages = Pages::all();
        
        return view('main.index',[
            'products' => $products,
            'categories' => $categories,
            'pages' => $pages
        ]);
    }

    public function category($name)
    {
        $categories = Category::all();
        $pages = Pages::all();
        $category = Category::where('name', $name)->get();

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
        /** @var Order $order */
        $order = Order::findOrFail($id);

        // We dont have a payment so send him to checkout.
        if(!$order->payment_id){
            return view('main.please-pay', [
                'message' => 'Je hebt nog niet uitgecheckt ' .
                    'met je winkelwagen, ga naar de checkout' .
                    ' pagina om verder te gaan en een betaling ' .
                    'aan te vragen. ',
                'url' => URL::route('checkout'),
                'info' => 'Checkout pagina'
            ]);
        }

        if($order->notification == 1){
            return view('main.please-pay', [
                'message' => 'Helaas kun je deze factuur niet meer inzien, maar gelukkig hebben we hem ook naar je gemaild. Check je inbox om deze factuur in te zien. ',
                'url' => URL::route('checkout'),
                'info' => 'Checkout pagina'
            ]);
        }

        $payment = Mollie::api()->payments()->get($order->payment_id);
        $items = OrderItem::where('order_id', $order->id)->get();

        if($payment->isPaid()){
            $request->session()->clear();
            $order->status = $payment->status;
            $order->save();
            $user = $order->user()->getResults();
            if($order->notification == 0 && isset($user)){
                    if ($order->mailUserPayedOrder($user, $order, $payment, $items)){
                        $order->notification = 1;
                        $order->save();
                    }
            }

            return view('main.thankyou', [
                'order' => $order,
                'payment' => $payment,
                'user' => Auth::user(),
                'items' => $items,
                'total' => $payment->amount,
                'verzendkosten' => '4,95'
            ]);
        }else{
            // Payment not paid, you could pay if its not expired..
            if ($payment->isExpired()) {
                $message = 'Je betaling is mislukt, als je nog
                geen bevestigings email hebt gehad moet je opnieuw je bestelling plaatsen. ';
            } elseif($payment->isOpen()) {
                $message = 'Je hebt je order nog niet betaald,
                je kunt dit alsnog doen via deze link: ';
            }

            return view('main.please-pay', [
                'message' => $message,
                'url' => $payment->getPaymentUrl(),
                'info' => 'Deze order veilig betalen met iDeal'
            ]);
        }
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

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $session = $request->session();
        $cart = $session->get('cart');
        $cartItems = $session->get('cart.items');


        if(!$user){
            return redirect('login');
        }

        if(!$session->has('cart.items')){
            // Geen items om uit te checken.
            return view('main.please-pay', [
                'message' => 'Helaas heb je nog geen producten in je winkelwagentje zitten, ' . '<br />' .' ' .
                    'ga terug en kom terug als je items in je winkelwagentje hebt.',
                'url' => URL::route('homepage'),
                'info' => 'Verder winkelen'
            ]);
        }
    
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->price;
        }
        $session->set('cart.total', $total);

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
            
            if(!$user){
                $user = new User();
            }
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
                Auth::login($user);
                $items = Session::get('cart.items');
                $order = new Order();
                $order->user_id = $user->id;
                $order->shipping_address = $user->adres . ', ' . $user->postcode . ', ' . $user->woonplaats;
                $order->billing_address = $user->adres . ', ' . $user->postcode . ', ' . $user->woonplaats;
                $order->amount = $total;
                $order->status = 'awaiting payment';
                $order->notification = 0;
                $order->save();

                foreach ($items as $item) {
                    $orderedProduct = new OrderItem();
                    $orderedProduct->user_id = $user->id;
                    $orderedProduct->product_id = $item->id;
                    $orderedProduct->order_id = $order->id;
                    $orderedProduct->quantity = 1;
                    $orderedProduct->price = $item->price;
                    $orderedProduct->item_name = $item->name;
                    $orderedProduct->item_info = $item->description;
                    $orderedProduct->save();
                }

                $payment = Mollie::api()->payments()->create([
                    "amount"      => $total,
                    "description" => "Betaling aan primera t.a.v E-Sigarett.nl",
                    "redirectUrl" => route('order.payment', ['id' => $order->id])
                ]);

                $order->status = 'Waiting for payment';
                $order->payment_id = $payment->id;
                $order->save();

                return redirect($payment->getPaymentUrl());
            }
        }

        return view('main.checkout', [
            'user' => $user,
            'cart' => $cart
        ]);
    }

    public function checkoutPayment(Request $request)
    {
        header('Content-Type: text/plain');
        print_r($request->all());exit;
    }

    public function paymentStatus(Request $request, $paymentId)
    {
        $payment = Mollie::api()->payments()->get($paymentId);

        dd($payment);
    }
}
