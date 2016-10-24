<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function voorwaarde()
    {
        return view('main.voorwaarde');
    }

    public function about()
    {
        return view('main.about');
    }

    public function policy()
    {
        return view('main.policy');
    }

    public function verzending()
    {
        return view('main.verzending');
    }

    public function garantie()
    {
        return view('main.garantie');
    }

    public function sitemap()
    {
        return view('main.cookie');
    }

    public function retour()
    {
        return view('main.cookie');
    }

}
