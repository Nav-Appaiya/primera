<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

//
//use App\Category;
//use App\Pages;
//use App\Product;
//use Illuminate\Http\Request;
//
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Session;

use App\Cart;
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
        $this->product = Product::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $methods = Mollie::api()->methods()->all();
        
        return view('cart.index')
            ->with([
                'products' => $cart,
                'methods' => $methods
            ]);
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
        
        debug(session()->get('cart', []));

        return view('cart.checkout')->with([
            'cart' => session('cart'),
            'producten' => $producten,
            'total' => $total,
            'user'=>$user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        
        session([
            'options' => [
                'levering' => $request->levering,
                'betaalmethode' => $request->betaalmethode,
                'gegevens' => [
                    'voornaam' => $user->voornaam,
                    'achternaam' => $user->achternaam,
                    'email' => $user->email,
                    'geboortedatum' => $user->geboortedatum,
                    'huisnummer' => $user->huisnummer,
                    'postcode' => $user->postcode,
                    'straatnaam' => $user->adres,
                    'land' => 'Nederland',
                    'plaats' => $user->woonplaats
                ]
            ]
        ]);
        
        $cart = session('cart');
        $total = 0;
        
        
        return view('cart.checkout')->with([
            'cart' => $cart,
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
        $property = Property::where('serialNumber', $request->serialcode)->first();

        $cart = new Cart($this->oldCart);
        $cart->add($property, $property->id);
        $request->session()->put('cart', $cart);

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


    public function check(Request $request, $id)
    {
        $session = $request->Session('options');

        if(!$session){
            // Uw gegevens
            $rules = [
                'value'          => 'required|unique:details,value',
            ];
        }elseif ($session){
            //Verzendmethode
            $rules = [
                'value'          => 'required|unique:details,value',
            ];
        }elseif ($id == 3){
            //Betaalmethode
            $rules = [
                'value'          => 'required|unique:details,value',
            ];
        }elseif ($id == 4){
            //Bevestiging
            //check mollie for status
        }



        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_property_create')
                ->withErrors($validator)
                ->withInput();
        }

        $details = $this->detail;

        $details->type = $request->type;
        $details->value = $request->value;

        $details->save();


        \Session::flash('succes_message','successfully.');

        return redirect()->route('cart');

//        return view('cart')->with('', );
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
