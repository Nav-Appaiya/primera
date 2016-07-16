<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Mail;

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

        $mail = Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('test@test.com');
                $message->to('navarajh@gmail.com', 'Admin')
                    ->subject('Contact form site e-sigarett.nl');
            });



        return \Redirect::route('contact')
            ->with('message', 'Bedankt voor je bericht, we nemen zo spoedig mogelijk contact met je op!');
    }
}
