<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        
        return view('admin.index', [
            'products' => $products,
            'orders' => $orders,
        ]);
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products.products', [
            'products' => $products
        ]);
    }
}
