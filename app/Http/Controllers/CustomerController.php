<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::all();

        return view('admin.customers.index', [
            'customers' => $customers
        ]);
    }
}
