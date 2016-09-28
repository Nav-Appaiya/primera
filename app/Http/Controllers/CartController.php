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
        $cart = new Cart($this->oldCart);

        return view('cart.index')
            ->with('products', $cart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.checkout')->with('cart', $this->oldCart);
    }

    public function update(Request $request)
    {
        session([
            'options' => [
                'levering' => $request->levering,
                'betaalmethode' => $request->betaalmethode,
                'gegevens' => [
                    'voornaam' => '',
                    'achternaam' => '',
                    'email' => '',
                    'geboortedatum' => '',
                    'huisnummer' => '',
                    'postcode' => '',
                    'straatnaam' => '',
                    'land' => '',
                    'plaats' => ''
                ]
            ]
        ]);

        $rules = [
            'title'     => 'required|max:25',
        ];

//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return redirect()
//                ->route('admin_category_edit', $request->id)
//                ->withErrors($validator)
//                ->withInput();
//        }

//        $category = $this->category->find($request->id);
//
//        $category->title = $request->title;
//
//        $category->save();
//
//        \Session::flash('succes_message', 'successfully.');

//        return redirect()->route('admin_category_index');

        return redirect()->route('cart');
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
//        $product = collect($property->first()->product()->first());
//        $product = collect($property->first()->product()->first())->only('id', 'price');
//        $new[$property->id] = collect($property)->only('serialNumber')->merge($product);
//
//dd($proper
        $cart->add($property, $property->id);

        $request->session()->put('cart', $cart);

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
