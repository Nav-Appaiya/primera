<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::all();

        return view('admin.customers.index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function show($id)
    {
        $customer = User::find($id);

        return view('admin.customers.show', [
            'customer' => $customer
        ]);
    }

    public function edit($id)
    {
        $customer = User::find($id);

        return view('admin.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * @return mixed
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array();
        $validator = Validator::make(Input::all(), $rules);
        $id = Input::get('id');
        // process the login
        if ($validator->fails()) {
            return Redirect::route('admin.customers.edit', $id)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $customer = User::find($id);
            if(!$customer){
                $customer = new User();
            }
            $customer->voornaam = Input::get('voornaam');
            $customer->achternaam = Input::get('achternaam');
            $customer->email = Input::get('email');

            $customer->save();
            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::route('admin.customers.index');
        }
    }

}
