<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function orders()
    {
        $orders = Order::where('user_id', 1)->get();

        return view('profile.orders', [
            'orders' => $orders
        ]);
    }
}
