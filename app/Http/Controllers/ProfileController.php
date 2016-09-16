<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('profile.orders', [
            'orders' => $orders
        ]);
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('login');
        }

        return view('profile.index', [
            'user' => $user
        ]);
    }
}
