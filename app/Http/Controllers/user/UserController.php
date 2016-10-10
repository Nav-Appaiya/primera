<?php

namespace App\Http\Controllers\user;

use App\Order;
use App\User;
use Illuminate\Http\Request;

use Validator;
use Hash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.profile.show')->with([
            'user' => $this->user,
            'orders' => $this->user->order()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('auth.profile.edit')->with('user', $this->user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'voornaam' => 'required|max:50|alpha',
            'voorletters' => 'required|max:6',
            'achternaam' => 'required|max:50|regex:/^[\pL\s]+$/u',
            'geslacht' => 'in:man,vrouw',
            'geboortedatum' => 'required|date',
            'adres' => 'required|max:70|regex:/^[\pL\s]+$/u',
            'huisnummer' => 'required|max:7|alpha_num',
            'postcode' => 'required|alpha_num|min:6',
            'woonplaats' => 'required|max:50|alpha',
            'telMobiel' => 'numeric|digits_between:10,10',
            'telThuis' => 'numeric|digits_between:10,11'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('user.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($this->user->id);

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

        return redirect()->route('user.show');
    }


    public function password_update(Request $request)
    {
        $rules = [
            'password'               => 'required|min:6|confirmed',
            'password_confirmation'  => 'required|min:6',
            'old_password'           => 'required|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('user.password.edit')
                ->withErrors($validator)
                ->withInput();
        }

        if (Hash::check($request->password, $this->user->password)) {
            $user = User::find($this->user->id);

            $user->password = bcrypt($request->password);

            $user->save();
        }

        return redirect()->route('user.show');
    }

    public function password_edit()
    {
        return view('auth.passwords.edit')
            ->with('user', $this->user);
    }

}
