<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    public function index()
    {
        return view('main.contact');
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->body = $request->get('message');
        $contact->save();

        return \Redirect::route('contact')
            ->with('message', 'Bedankt voor je bericht, we nemen zo spoedig mogelijk contact met je op!');
    }
}
