<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $loginPath = '/auth/login';
    protected $redirectPath = "/admin"; // <= this


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'voornaam' => $data['voornaam'],
            'achternaam' => $data['achternaam'],
            'geslacht' => $data['geslacht'],
            'geboortedatum' => $data['geboortedatum'],
            'adres' => $data['adres'],
            'huisnummer' => $data['huisnummer'],
            'postcode' => $data['postcode'],
            'woonplaats' => $data['woonplaats'],
            'telMobiel' => $data['telMobiel'],
            'telThuis' => $data['telThuis']
        ]);
    }
}
