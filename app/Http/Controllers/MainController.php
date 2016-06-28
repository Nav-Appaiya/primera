<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Mollie\Laravel\Facades\Mollie;


class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $pages = Pages::all();

        return view('main.index',[
            'products' => $products,
            'categories' => $categories,
            'pages' => $pages
        ]);
    }

    public function category($id)
    {
        $categories = Category::all();
        $pages = Pages::all();
        $category = Category::find($id);

        return view('main.category', [
            'category' => $category,
            'categories' => $categories,
            'pages' => $pages
        ]);
    }

    public function page($pageId)
    {
        $page = Pages::where('name', $pageId)->first();

        return view('main.page', [
            'page' => $page,
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all()
        ]);
    }

    public function cart()
    {
        return view('main.cart', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all()
        ]);
    }

    public function testing()
    {
        return view('layouts.mastermenu');
    }
    
    /**
     * @throws \Mollie_API_Exception
     */
    public function mollietesting()
    {
        $payment = Mollie::api()->payments()->create([
            "amount"      => 10.00,
            "description" => "Bestelling",
            "redirectUrl" => "http://localhost:8000/test",
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        if ($payment->isPaid())
        {
            echo "Payment received.";
        }
        header('Content-Type: text/plain');
        print_r($payment->getPaymentUrl());exit;
    }

    public function categories()
    {
        return view('main.category', [
            'category' => Category::find(1)
        ]);
    }
}
