<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-08-16
 * Time: 20:34
 */

namespace App;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    /**
     * @param ProviderUser $providerUser
     * @return User
     */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
//                    'geboortedatum' => $providerUser->getBirthday(),
//                    'woonplaats' => $providerUser->getCity(),
//                    'adres' => $providerUser->getStreet(),
//                    'postcode' => $providerUser->getZip(),
//                    'voornaam' => $providerUser->getFirstName(),
//                    'achternaam' => $providerUser->getLastName(),
//                    'woonplaats' => $providerUser->getHometown(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

}
