<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $product;
    protected $order;
    protected $user;

    public function __construct()
    {
        $this->product = Product::all();
        $this->user = User::select();
        $this->order = Order::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.index')
            ->with('order', $this->order)
            ->with('product', $this->product)
            ->with('users', $this->user->select('*', DB::raw('count(DAY(created_at)) as total'))
//                ->groupBy('created_at')
                ->groupBy(
//                    function($date) {
//                    return Carbon::parse($date->created_at)->format('M'); // grouping by months
//                }
                )
                ->get());
//                ->select(
//                DB::raw('id','count(*) as total')
//            )->get()
//                ->groupBy(function($date) {
//                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
//                }));
    }
}
