<?php

namespace App\Providers;

use App\Category;
use App\Cart;

use Session;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master', function($view)
        {
            $view->with('main_categories', Category::where('category_id', 0)->orderBy('title', 'ASC')->get());
        });

        Socialite::extend('mollie', function ($app) {
            $config = $app['config']['services.mollie'];

            return Socialite::buildProvider('Mollie\Laravel\MollieConnectProvider', $config);
        });

        view()->composer('layouts.master', function($view)
        {
            $view->with('cart_items', Session::has('cart') ? Session::get('cart') : null);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
