<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Mollie\Laravel\Facades\Mollie;

/**
 * Class CheckoutController
 *
 * @package App\Http\Controllers
 */
class CheckoutController extends Controller
{

    /** Nav Appaiya 16-09-2016 14:31
     *  See Mollie API Docs for status & their use.
     *  Docs: https://www.mollie.com/nl/docs/status
     */
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->middleware('auth');
        $cart = $request->session()->get('cart.items');
        $producten = [];

        foreach ($cart as $cartItem) {
            if (!$cartItem instanceof Product) {
                $item = Product::find($cartItem);
            }
            $producten[] = $item;
        }
        
        return view('main.checkout', [
            'user' => $request->user(),
            'cart' => $cart,
            'producten' => $producten,
            'total' => session('cart')->price
        ]);
    }

    private function calculateCartTotal($decimal = false)
    {
        $cart = session('cart');
        
        return $cart['price'];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function checkout(Request $request)
    {
        // Amount pay through Mollie:
        $total = $this->calculateCartTotal();
        $user = Auth::user();

        // Validating rules for order-data
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|min:3',
            'street' => 'required|',
            'street_number' => 'required|min:1',
            'postcode' => 'required|min:5',
            'plaats' => 'required|min:5',
            'birthdate' => 'required',
            'phone_home' => 'required|min:8',
            'phone_mobile' => 'required|min:8',
            'email' => 'required|email'
        ];

        $validator = Validator::make(Input::all(), $rules);

        // Als Validatie faalt, ga dan terug met de error messages. 
        if ($validator->fails()) {
            return Redirect::to('checkout')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        $order = new Order();
        $order->user()->associate(Auth::user());
        $order->postcode = $request->get('postcode');
        $order->adres = $request->get('street');
        $order->huisnummer = $request->get('street_number');
        $order->woonplaats = $request->get('plaats');
        $order->status = self::STATUS_PENDING;
        $order->payment_id = '';
        $order->notification = 0;
        $order->save();

        // Orderlines
        $lines = [];
        foreach ($request->session()->get('cart.items') as $item) {
            $product = Product::find($item);
            $line = new OrderItem();
            $line->hasOne($product);
            $line->amount = 1;
            $line->product_id = $item;
            $line->save();

            $lines[] = $line;
        }

        // Save orderlines to the order.
        $order->orderItems()->saveMany($lines);

        // Create the Mollie payment
        $payment = Mollie::api()->payments()->create([
            "amount" => $this->calculateCartTotal(false),
            "description" => "Betaling aan primera t.a.v E-Sigarett.nl",
            "redirectUrl" => route('order.payment', ['id' => $order->id])
        ]);

        // Keep mollie payment_id to the order for later retrieval.
        $order->payment_id = $payment->id;
        $order->save();

        return redirect($payment->getPaymentUrl());
    }

    public function payed(Request $request, $id)
    {
        $user = Auth::user();
        /** @var Order $order */
        $order = Order::where([
            'user_id' => $user->id,
            'id' => $id
        ])->first();
        
        // We dont have a payment so send him to checkout.
        if (!$order->payment_id) {
            
            return view('main.please-pay', [
                'message' => 'Je hebt nog niet uitgecheckt ' .
                    'met je winkelwagen, ga naar de checkout' .
                    ' pagina om verder te gaan en een betaling ' .
                    'aan te vragen. ',
                'url' => URL::route('checkout'),
                'info' => 'Checkout pagina'
            ]);
            
        }
        

        $payment = Mollie::api()->payments()->get($order->payment_id);
        $items = $order->orderItems()->getResults();
        
        
        // Payment not paid, you could pay if its not expired..
        if (!$payment->isPaid()) {
            if ($payment->isExpired()) {
                $message = 'Je betaling is mislukt, als je nog
                geen bevestigings email hebt gehad moet je opnieuw je bestelling plaatsen. ';
            } elseif ($payment->isOpen()) {
                $message = 'Je hebt je order nog niet betaald,
                je kunt dit alsnog doen via deze link: ';
            }

            return view('main.please-pay', [
                'message' => $message,
                'url' => $payment->getPaymentUrl(),
                'info' => 'Deze order veilig betalen met iDeal'
            ]);
        }
        
//        $request->session()->clear();
        $order->status = $payment->status;
        $order->save();
        
        // Check of email bevestiging verstuurd is.
        if ($order->notification == 0) {
            if ($order->mailUserPayedOrder($user, $order, $payment, $items)) {
                $order->notification = 1; // Save naar 1 zodat deze niet meerdere keren kan worden verstuurd.
                $order->save();
            }
        }
        
        return view('main.thankyou', [
            'order' => $order,
            'payment' => $payment,
            'user' => $user,
            'items' => $items,
            'total' => $payment->amount,
            'verzendkosten' => '4,95'
        ]);
    }

}
