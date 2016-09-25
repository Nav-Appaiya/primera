<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Input;

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
        $days = Input::get('days', 7);

        $range = Carbon::now()->subDays($days);

        $stats = User::where('created_at', '>=', $range)

            ->groupBy('date')
            ->orderBy('date', 'DESC')
////            ->remember(1440)
            ->get([
//                DB::raw('TO_CHAR(created_at, "DD") '),
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ]);
//            ->groupBy(function ($date){
//                return Carbon::parse($date->created_at)->format('D');
//            });
//            ->toJSON();

        return view('admin-panel.admin.index')
            ->with('order', $this->order)
            ->with('users', $stats->toJSON())
//            ->with('users', $this->user->select('*', DB::raw('count(*) as total, TO_CHAR(created_at,"DD-MON-YYYY")'))
//                ->groupBy('created_at')
//                ->get())
            ->with('products', $this->user);
//            ->with('user', DB::select( DB::raw("SELECT to_char(a.created_at - 7/24,'IYYY'), to_char(a.created_at - 7/24,'IW'),SUM(b.ammount)
//FROM order a, orderedproducts b WHERE a.id = b.order_id
//GROUP BY to_char(a.created_at  - 7/24,'IYYY'), to_char(a.created_at  - 7/24,'IW')") ));


//            ->with('users', $this->user->select('*', DB::raw('count(DAY(created_at)) as total'))
////                ->groupBy('created_at')
//                ->groupBy(
////                    function($date) {
////                    return Carbon::parse($date->created_at)->format('M'); // grouping by months
////                }
//                )
//                ->get());
//                ->select(
//                DB::raw('id','count(*) as total')
//            )->get()
//                ->groupBy(function($date) {
//                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
//                }));
    }
}
