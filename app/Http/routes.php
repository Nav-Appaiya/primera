<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//auth routes for users
Route::auth();

//base routes
Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@index']);
Route::get('/algemene-voorwaarde', ['as' => 'voorwaarde', 'uses' => 'HomeController@voorwaarde']);
Route::get('/over-ons', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('/privacy-policy', ['as' => 'policy', 'uses' => 'HomeController@policy']);
Route::get('/verzending', ['as' => 'verzending', 'uses' => 'HomeController@verzending']);
Route::get('/garantie', ['as' => 'garantie', 'uses' => 'HomeController@garantie']);
Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'HomeController@sitemap']);
Route::get('/retouren', ['as' => 'retour', 'uses' => 'HomeController@retour']);
Route::get('/faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);

//searching products
Route::get('/find', 'SearchController@find');

//shopping cart routes
Route::get('/winkelwagen', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::post('/winkelwagen/toevoegen', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::post('/winkelwagen/verwijder', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
Route::post('/winkelwagen/plus', ['as' => 'cart.increase', 'uses' => 'CartController@increase']);
Route::post('/winkelwagen/min', ['as' => 'cart.decrease', 'uses' => 'CartController@decrease']);
Route::post('/winkelwagen/legen', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::get('/winkelwagen/checkout', ['as' => 'cart.checkout', 'uses' => 'CartController@edit']);
Route::patch('/winkelwagen/checkout', ['as' => 'cart.checkout.check', 'uses' => 'CartController@check']);
Route::get('/winkelwagen/afrekenen/{id}', ['as' => 'order.show', 'uses' => 'MollieController@show']);

// Checkout & Payment routes
Route::post('/order/create', ['as' => 'order.create', 'uses' => 'MollieController@create']);
Route::get('/order/payment/{id}', ['as' => 'order.get', 'uses' => 'MollieController@get']);

// oAuth Routes for facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@handleProviderCallback');

// product & category routes
Route::get('/{name}/c-{id}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
Route::get('/{cate1}/{cate2}/c-{id}/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
Route::get('/{title}/p-{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);

// Start of contact routes
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'ContactController@store']);

// User authentication routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('/registreren', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/registreren', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/inloggen', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/inloggen', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);

//user account info routes
Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
    Route::get('/mijn-gegevens', ['as' => 'user.show', 'uses' => 'user\UserController@show']);
    Route::get('/mijn-gegevens/wijzigen', ['as' => 'user.edit', 'uses' => 'user\UserController@edit']);
    Route::patch('/mijn-gegevens', ['as' => 'user.update', 'uses' => 'user\UserController@update']);
    Route::get('/mijn-gegevens/wachtwoord', ['as' => 'user.password.edit', 'uses' => 'user\UserController@password_edit']);
    Route::patch('/mijn-gegevens/wachtwoord', ['as' => 'user.password.update', 'uses' => 'user\UserController@password_update']);
    //    Route::get('/mijn-bestelling', ['as' => 'user.order.index', 'uses' => 'Auth\OrderController@index']);
    //    Route::get('/mijn-bestelling/{order_id}', ['as' => 'user.order.show', 'uses' => 'Auth\OrderController@show']);
    Route::get('/uitloggen', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
});

//product images route
Route::get('/images/{filename}', ['as' => 'image.show', 'uses' => 'ImageController@show']);

// Admin authorisation only for admins, not authed users!
Route::group(['prefix' => 'admin', 'middleware' => ['adminRole']], function () {
    Route::get('/', ['as' => 'admin_dashboard_index', 'uses' => 'admin\HomeController@index']);

//  admin product routes
    Route::get('product/create', ['as' => 'admin_product_create', 'uses' => 'admin\ProductController@create']);
    Route::get('product', ['as' => 'admin_product_index', 'uses' => 'admin\ProductController@index']);
    Route::get('product/{id}/edit', ['as' => 'admin_product_edit', 'uses' => 'admin\ProductController@edit']);
    Route::get('product/{id}', ['as' => 'admin_product_show', 'uses' => 'admin\ProductController@show']);
    Route::post('product', ['as' => 'admin_product_store', 'uses' => 'admin\ProductController@store']);
    Route::patch('product', ['as' => 'admin_product_update', 'uses' => 'admin\ProductController@update']);
    Route::delete('product/destroy/{id}',
        ['as' => 'admin_product_destroy', 'uses' => 'admin\ProductController@destroy']);

//  admin product details routes
    Route::get('detail/create', ['as' => 'admin_property_create', 'uses' => 'admin\DetailController@create']);
    Route::get('detail', ['as' => 'admin_property_index', 'uses' => 'admin\DetailController@index']);
    Route::get('detail/{id}/edit', ['as' => 'admin_property_edit', 'uses' => 'admin\DetailController@edit']);
    Route::post('detail', ['as' => 'admin_property_store', 'uses' => 'admin\DetailController@store']);
    Route::patch('detail', ['as' => 'admin_property_update', 'uses' => 'admin\DetailController@update']);
    Route::delete('detail/destroy/{id}',
        ['as' => 'admin_property_destroy', 'uses' => 'admin\DetailController@destroy']);

    //admin product properties routes
    Route::get('product-property/{id}/create',
        ['as' => 'admin_product_property_create', 'uses' => 'admin\PropertyController@create']);
    Route::get('product-property/{id}/edit',
        ['as' => 'admin_product_property_edit', 'uses' => 'admin\PropertyController@edit']);
    Route::post('product-property',
        ['as' => 'admin_product_property_store', 'uses' => 'admin\PropertyController@store']);
    Route::patch('product-property',
        ['as' => 'admin_product_property_update', 'uses' => 'admin\PropertyController@update']);
    Route::delete('product-property/destroy/{id}',
        ['as' => 'admin_product_property_destroy', 'uses' => 'admin\PropertyController@destroy']);
    Route::patch('product-property/stock',
        ['as' => 'admin_product_property_addstock', 'uses' => 'admin\PropertyController@AddStock']);

    //admin categories
    Route::get('categories', ['as' => 'admin_category_index', 'uses' => 'Admin\CategoryController@index']);
    Route::get('categories/{category}/edit',
        ['as' => 'admin_category_edit', 'uses' => 'Admin\CategoryController@edit']);
    Route::get('categories/create', ['as' => 'admin_category_create', 'uses' => 'Admin\CategoryController@create']);
    Route::post('categories', ['as' => 'admin_category_store', 'uses' => 'Admin\CategoryController@store']);
    Route::patch('categories', ['as' => 'admin_category_update', 'uses' => 'Admin\CategoryController@update']);

    //admin reviews
    Route::get('reviews', ['as' => 'admin_review_index', 'uses' => 'Admin\ReviewController@index']);
    Route::get('reviews/{id}', ['as' => 'admin_review_show', 'uses' => 'Admin\ReviewController@show']);
    Route::post('reviews/{id}', ['as' => 'admin_review_update', 'uses' => 'Admin\ReviewController@update']);
    Route::get('reviews/{id}/edit', ['as' => 'admin_review_edit', 'uses' => 'Admin\ReviewController@edit']);
    Route::post('reviews', ['as' => 'admin_review_update', 'uses' => 'Admin\CategoryController@update']);
    Route::delete('reviews/{id}', ['as' => 'admin_review_destroy', 'uses' => 'Admin\ReviewController@destroy']);

    //admin orders
    Route::get('orders', ['as' => 'admin_order_index', 'uses' => 'Admin\OrderController@index']);
    Route::get('orders/{id}/edit', ['as' => 'admin_order_edit', 'uses' => 'Admin\OrderController@edit']);
    Route::post('orders/{id}', ['as' => 'admin_order_update', 'uses' => 'Admin\OrderController@update']);
//    Route::patch('orders/{id}/levering', ['as' => 'admin_order_store', 'uses' => 'Admin\OrderController@store']);

    //admin users
    Route::get('users', ['as' => 'admin_user_index', 'uses' => 'Admin\UserController@index']);
    Route::get('users/{id}/edit', ['as' => 'admin_user_edit', 'uses' => 'Admin\UserController@edit']);
    Route::patch('users/{id}', ['as' => 'admin_user_update', 'uses' => 'Admin\UserController@update']);
    Route::delete('users/{id}', ['as' => 'admin_user_destroy', 'uses' => 'Admin\UserController@destroy']);

    Route::get('search-engine', ['as' => 'admin_seo_index', 'uses' => 'Admin\SearchEngineController@index']);
    Route::patch('search-engine', ['as' => 'admin_seo_create', 'uses' => 'Admin\SearchEngineController@create']);

    //admin image delete
    Route::delete('image/{id}',
        ['as' => 'admin_image_destroy', 'uses' => 'admin\ImageController@remove']);

    //admin panel settings
    Route::get('settings', ['as' => 'dashboard.settings', 'uses' => 'Admin\SettingsController@index']);
    Route::patch('settings', ['as' => 'dashboard.settings.update', 'uses' => 'Admin\SettingsController@update']);

}); // End of authed route group.

