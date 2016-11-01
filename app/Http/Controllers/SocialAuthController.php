<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->route('homepage');

    }

}
