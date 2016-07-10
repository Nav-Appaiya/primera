<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Pages;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->body = $request->message;
            $contact->save();
            $request->session()->flash('status', 'Bedankt voor je bericht, we nemen zo snel mogelijk contact met je op!');
        }


        return view('main.contact', [
            'categories' => Category::all(),
            'pages' => Pages::all(),
            'products' => Product::all()
        ]);
    }
}
