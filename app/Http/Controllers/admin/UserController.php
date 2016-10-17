<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Auth;

use Validator;
use Input;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $user;
    protected $users;

    public function __construct()
    {
//        $this->middleware('auth');

        $this->users = new User();
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.users.index')->with('users', $this->users->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-panel.admin.users.edit')->with('user', $this->users->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'voornaam' => 'max:50|alpha',
            'voorletters' => 'max:6',
            'achternaam' => 'max:50|regex:/^[\pL\s]+$/u',
            'geslacht' => 'in:man,vrouw',
            'geboortedatum' => 'date',
            'adres' => 'max:70|regex:/^[\pL\s]+$/u',
            'huisnummer' => 'max:7|alpha_num',
            'postcode' => 'alpha_num|min:6',
            'woonplaats' => 'max:50|alpha',
            'telMobiel' => 'numeric|digits_between:10,10',
            'telThuis' => 'numeric|digits_between:10,11'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_user_edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);

        $user->voornaam = $request->voornaam;
        $user->voorletters = $request->voorletters;
        $user->achternaam = $request->achternaam;
        $user->geslacht = $request->geslacht;
        $user->geboortedatum = $request->geboortedatum;
        $user->adres = $request->adres;
        $user->huisnummer = $request->huisnummer;
        $user->postcode = $request->postcode;
        $user->woonplaats = $request->woonplaats;
        $user->telMobiel = $request->telMobiel;
        $user->telThuis = $request->telThuis;

        $user->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_user_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
