<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Property;

use DB;

use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;
use Session;
use Redirect;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;

class CartController extends Controller
{
    public function __construct()
    {
        $this->oldCart = Session::has('cart') ? Session::get('cart') : null;
        $this->product = new Property();
        $this->mollie = Mollie::api();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response\
     */
    public function index()
    {
        return view('cart.index')
            ->with('products', new Cart($this->oldCart));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producten = [];
        $total = 0;
        $user = Auth::user();

        return view('cart.checkout')->with([
            'cart' => session('cart'),
            'producten' => $producten,
            'total' => $total,
            'user'=>$user
        ]);
    }

    public function edit()
    {

        $methods = $this->mollie->methods()->all();

        return view('cart.checkout')
            ->with('user', Auth::user())
            ->with('methods', $methods);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }

        $total = 0;
        
        
        return view('cart.checkout')->with([
            'cart' => $this->oldCart,
            'total' => $total,
            'user'=>$user
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'serialcode' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $property = Property::where('serialNumber', $request->serialcode)->first();

        $cart = new Cart($this->oldCart);
        $cart->add($property, $property->id);
        $request->session()->put('cart', $cart);
//
        \Session::flash('succes_message','successfully.');

        return redirect()->route('cart');
    }


    public function remove(Request $request)
    {
        $property = Property::where('serialNumber', $request->serialcode)->first();

        $cart = new Cart($this->oldCart);
        $cart->remove($property, $property->id);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove_key(Request $request)
    {


//        $property = Property::where('id', $request->serialcode)->first();
//        dd($property);

//        $asd = $request->session()->pull('cart.items', array_diff($request->session()->get('cart.items'), [$request->serialcode]));
//        $request->session()->forget('cart.items.'.$request->serialcode);
//
//        unset($this->oldCart['items'][$request->serialcode]);

        $items = array_except($this->oldCart['items'], $request->serialcode);

        dd($items);

        foreach ($items as $item){

            $property = Property::find($item->id)->first();

            $cart = new Cart($this->oldCart);
            $cart->add($property, $property->id);
        }


        $request->session()->put('cart', $cart);


//        $newCart = $this->oldCart;
//        $request->session()->forget('cart.items.3');
//        $newCart = $request->session()->get('cart')['items'];

         $newCart = array_except($this->oldCart['items'], $request->serialcode);

        dd(Session::get('cart'));
//        $cart = new Cart($newCart);

//        $request->session()->put('cart', $cart);


//        Session::forget('cart.items.3');
//        dd($newCart);
//        dd((int)$request->serialcode);

//        foreach ($cart as $index => $product) {
//            if ($product['productId'] == $id) {
//                unset($newCart[$request->serialcode]);
//            }
//        }
//        session(['cart' => $cart]);

//        dd($request->serialcode);
//
//        dd($request->session()->get('cart'));

//        $request->session()->put('cart', $cart);

//        if($request->session()->get('cart') == NULL){
//            Session::forget('cart');
//        }



//        $newCart =;

//        return new Cart($newCart);
//        unset($cart['items'][$request->serialcode]);

//        return dd($cart);



//        if(Session::has('cart')) {
//            $classes = Session::get('cart.items');
//            foreach($classes as $index => $class) {
//                if($data['class'] === $class) {
//                    unset($classes[$index]);
//                    $newClass = array_values($classes);
//                    Session::put('class', $newClass);
//                    return Response::json(array(
//                            'success' => true,
//                            'code' => 1,
//                            'class' => $classes,
//                            'message' => $data['class'] . ' removed from cart'
//                        )
//                    );
//                }
//            }
//        }

        return redirect()->route('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Session::forget('cart');
        return redirect()->back();
    }


    public function check(Request $request)
    {
        $cart = new Cart($this->oldCart);

        $rules = [
            'levering' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('cart.checkout')
                ->withErrors($validator)
                ->withInput();
        }

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->status = 'open';
        $order->total_price = $cart['price'];
        $order->delivery_type = $request->levering;
        $order->delivery_price = $request->levering == 'verzenden' ? env('PACKAGE_POST_PRICE') : env('PACKAGE_GET_PRICE');
        $order->adres = $request->adres;
        $order->huisnummer = $request->huisnummer;
        $order->postcode = $request->postcode;
        $order->woonplaats = $request->woonplaats;

        $order->save();

        foreach ($cart['items'] as $item => $value){
            $property = $this->product->find($item);
//            dd($product);
            $array[] = [
                'property_id' => $property->id,
                'order_id' => $order->id,
                'selling_price' => $property->product->price - $property->product->discount,
                'amount' => $value['qty']
            ];
        }

        OrderItem::insert($array);

        return redirect()->route('order.show', $order->id);
    }

}


//    public function index(Request $request)
//    {
//        $cart = $request->session()->get('cart.items');
//        $products = [];
//        $total = 0;
//
//        if(count($cart) >= 1){
//            foreach ($cart as $item) {
//                $product = Product::find($item);
//                if($product){
//                    $total += $product->price;
//                    $products[] = $product;
//                }
//            }
//        }
//
//        return view('main.cart', [
//            'categories' => Category::all(),
//            'pages' => Pages::all(),
//            'products' => $products,
//            'cart' => $cart,
//            'total' => $total
//        ]);
//    }
//
//    // Toevoegen middels post request POST: /cart/add [product[props]]
//    public function addCart(Request $request)
//    {
//        $product = json_decode($request->get('product'));
//        $request->session()->push('cart.items', $product->id);
//
//        $request->session()->flash('status', 'Het product is toegevoegd aan je winkelwagentje!');
//        return Redirect::back();
//    }
//
//    public function removeCart(Request $request, $id)
//    {
//        //  Bij meerdere items moet er 1 verwijderd worden uit de cart.items
//        $pulled = $request->session()->pull('cart.items', $id);
//
//        if(count($pulled) > 1){
//            // more than 1 in cart, add remaining back
//            foreach ($pulled as $key => $value) {
//                if($key==0) continue;
//                $request->session()->push('cart.items', $value);
//            }
//        }
//
//        $request->session()->flash('status', 'Het product is verwijderd uit je winkelwagentje!');
//
//        return Redirect::back();
//    }
//
//    private function getTotal(Request $request)
//    {
//        $cartItems = $request->session()->get('cart.items');
//
//        $total = 0;
//        if(count($cartItems) !== 0){
//            foreach ($cartItems as $cartItem) {
//                $total += $cartItem->price;
//            }
//        }
//
//        return $total;
//    }
//}
