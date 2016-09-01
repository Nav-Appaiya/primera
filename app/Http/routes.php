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

Route::get('/test', ['as' => 'test', 'uses' => 'MainController@carting']);

Route::get('/', ['as' => 'homepage', 'uses' => 'MainController@index']);

Route::get('/home', ['as' => 'home', 'uses' => 'MainController@index']);

// Start of contact routes
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);

Route::post('contact', ['as' => 'contact_store', 'uses' => 'ContactController@store']);

// algemene-voorwaarde
Route::get('/algemene-voorwaarde', ['as' => 'voorwaarde', 'uses' => 'MainController@voorwaarde']);
Route::get('/over-ons', ['as' => 'about', 'uses' => 'MainController@about']);
Route::get('/privacy-policy', ['as' => 'policy', 'uses' => 'MainController@policy']);
Route::get('/verzending', ['as' => 'verzending', 'uses' => 'MainController@verzending']);
Route::get('/cookies', ['as' => 'cookies', 'uses' => 'MainController@cookie']);

Route::post('/checkout', ['as' => 'checkout', 'uses' => 'MainController@checkout']);
Route::get('/checkout', ['as' => 'checkout', 'uses' => 'MainController@checkout']);

Route::get('/payment', ['as' => 'payment', 'uses' => 'MainController@payment']);

Route::get('mollie/status/{paymentid}', ['as' => 'payment.status', 'uses' => 'MainController@paymentStatus']);
//
//Route::get('/profile/orders', ['as' => 'profile.orders', 'uses' => 'ProfileController@orders']);
//Route::get('/profile', ['as' => 'profile.index', 'uses' => 'ProfileController@index', 'middleware' => 'auth']);

// User authentication routes... Nav Appaiya 19 July 21:55
Route::get('auth/login', ['as'=>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('/login', ['uses' => 'Auth\AuthController@getLogin']);

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logoff', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/product/{id}', ['as' => 'product_detail', 'uses' => 'ProductController@detail']);
Route::get('/product/{id}/add', ['as' => 'product_add', 'uses' => 'ProductController@add']);
Route::get('/category/{name}', ['as' => 'category_detail', 'uses' => 'MainController@category']);
Route::get('/categories', ['as' => 'categories_all', 'uses' => 'ProductController@add']);
Route::get('/pages/{pageId}', 'MainController@page');
//Route::get('/admin', 'AdminController@index');
Route::get('/cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('/cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@addCart']);
Route::get('/cart/remove/{id}', ['as' => 'cart.remove', 'uses' => 'CartController@removeCart']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/order/payment/{id}', ['as' => 'order.payment', 'uses' => 'MainController@payed']);
}); // End of authed route group.

Route::group(['middleware' => 'web'], function () {
    Route::get('/{name}/c-{id}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
    Route::get('/{cate1}/{cate2}/c-{id}/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
});

Route::group(['prefix' => '/', 'middleware' => ['web', 'auth']], function () {

//Route::get('/profile/orders', ['as' => 'profile.orders', 'uses' => 'ProfileController@orders']);
//Route::get('/profile', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);

//
//    Route::get('/', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/algemene-voorwaarden', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/over-ons', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/faq', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/privacy-policy', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/verzending', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/cookie-beleid', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/product/{id}', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/producten/{categorie}', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/mijn-bestelling', ['as' => '', 'uses' => 'HomeController@']);
    Route::get('/mijn-gegevens', ['as' => 'user.show', 'uses' => 'user\UserController@show']);
    Route::get('/mijn-gegevens/wijzigen', ['as' => 'user.edit', 'uses' => 'user\UserController@edit']);
    Route::patch('/mijn-gegevens', ['as' => 'user.update', 'uses' => 'user\UserController@udate']);
//    Route::get('/retouren', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/sitemap', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/winkelwagen', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/', ['as' => '', 'uses' => 'HomeController@']);
//    Route::get('/', ['as' => '', 'uses' => 'HomeController@']);

});


// Admin authorisation only for admins, not authed users!
//Route::group(['prefix' => 'admin', 'middlewareGroups' => ['web', 'admin']], function () {
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {

    //    Route::get('/admin/orders', ['as' => 'orders.index', 'uses' => 'OrderController@index']);
//    Route::get('/admin/orders/new', ['as' => 'orders.create', 'uses' => 'OrderController@create']);
//    Route::post('/admin/orders/store', ['as' => 'orders.store', 'uses' => 'OrderController@store']);
//    Route::get('/admin/orders/{order}/edit/', ['as' => 'orders.edit', 'uses' => 'OrderController@edit']);
//    Route::get('/admin/orders/{order}/show/', ['as' => 'orders.show', 'uses' => 'OrderController@show']);
//    Route::get('/admin/orders/{order}/destroy/', ['as' => 'orders.destroy', 'uses' => 'OrderController@destroy']);
//    Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
//    Route::get('/admin/product/new', ['as' => 'admin_product_new', 'uses' => 'ProductController@newProduct']);
//    Route::get('/admin/products', ['as' => 'admin_product_index', 'uses' => 'AdminController@products']);
//    Route::get('/admin/product/destroy/{id}', ['as' => 'admin_product_destroy', 'uses' => 'ProductController@destroy']);
//    Route::get('/admin/product/{id}', ['as' => 'admin_product_detail', 'uses' => 'ProductController@index']);
//    Route::get('/admin/product/{product}/edit/', ['as' => 'admin_product_edit', 'uses' => 'ProductController@edit']);
//    Route::post('/admin/product/save', ['as' => 'admin_product_save', 'uses' => 'admin\ProductController@store']);//admin categories controller
//    Route::get('/admin/categories', ['as' => 'admin_category_index', 'uses' => 'CategoryController@index']);
//    Route::get('/admin/categories/{category}/edit', ['as' => 'admin_category_edit', 'uses' => 'CategoryController@edit']);
//    Route::get('/admin/categories/create', ['as' => 'admin_category_create', 'uses' => 'CategoryController@create']);
//    Route::post('/admin/categories', ['as' => 'admin_category_store', 'uses' => 'CategoryController@store']);
//    Route::patch('/admin/categories', ['as' => 'admin_category_update', 'uses' => 'CategoryController@update']);
//    Route::get('/admin/property', ['as' => 'admin_property_index', 'uses' => 'PropertyController@index']);
//    Route::get('/admin/property/{id}/edit', ['as' => 'admin_property_edit', 'uses' => 'PropertyController@edit']);
//    Route::get('/admin/property/{id}', ['as' => 'admin_property_show', 'uses' => 'PropertyController@show']);
//    Route::get('/admin/property/create', ['as' => 'admin_property_create', 'uses' => 'PropertyController@create']);
//    Route::post('/admin/property', ['as' => 'admin_property_store', 'uses' => 'PropertyController@store']);
//    Route::patch('/admin/property', ['as' => 'admin_property_update', 'uses' => 'PropertyController@update']);
//    Route::get('/admin/property/destroy/{id}', ['as' => 'admin_property_destroy', 'uses' => 'PropertyController@destroy']);

    Route::get('/', ['as' => 'admin_dashboard_index', 'uses' => 'admin\HomeController@index']);

    Route::get('product/create', ['as' => 'admin_product_create', 'uses' => 'admin\ProductController@create']);
    Route::get('product', ['as' => 'admin_product_index', 'uses' => 'admin\ProductController@index']);
    Route::get('product/{id}/edit', ['as' => 'admin_product_edit', 'uses' => 'admin\ProductController@edit']);
    Route::get('product/{id}', ['as' => 'admin_product_show', 'uses' => 'admin\ProductController@show']);
    Route::post('product', ['as' => 'admin_product_store', 'uses' => 'admin\ProductController@store']);
    Route::patch('product', ['as' => 'admin_product_update', 'uses' => 'admin\ProductController@update']);
    Route::delete('product/destroy/{id}', ['as' => 'admin_product_destroy', 'uses' => 'admin\ProductController@destroy']);

    Route::get('detail/create', ['as' => 'admin_property_create', 'uses' => 'admin\DetailController@create']);
    Route::get('detail', ['as' => 'admin_property_index', 'uses' => 'admin\DetailController@index']);
    Route::get('detail/{id}/edit', ['as' => 'admin_property_edit', 'uses' => 'admin\DetailController@edit']);
    Route::post('detail', ['as' => 'admin_property_store', 'uses' => 'admin\DetailController@store']);
    Route::patch('detail', ['as' => 'admin_property_update', 'uses' => 'admin\DetailController@update']);
    Route::delete('detail/destroy/{id}', ['as' => 'admin_property_destroy', 'uses' => 'admin\DetailController@destroy']);

    Route::get('product-property/{id}/create', ['as' => 'admin_product_property_create', 'uses' => 'admin\PropertyController@create']);
    Route::get('product-property/{id}/edit', ['as' => 'admin_product_property_edit', 'uses' => 'admin\PropertyController@edit']);
    Route::post('product-property', ['as' => 'admin_product_property_store', 'uses' => 'admin\PropertyController@store']);
    Route::patch('product-property', ['as' => 'admin_product_property_update', 'uses' => 'admin\PropertyController@update']);
    Route::delete('product-property/destroy/{id}', ['as' => 'admin_product_property_destroy', 'uses' => 'admin\PropertyController@destroy']);

    //admin categories
    Route::get('categories', ['as' => 'admin_category_index', 'uses' => 'Admin\CategoryController@index']);
    Route::get('categories/{category}/edit', ['as' => 'admin_category_edit', 'uses' => 'Admin\CategoryController@edit']);
    Route::get('categories/create', ['as' => 'admin_category_create', 'uses' => 'Admin\CategoryController@create']);
    Route::post('categories', ['as' => 'admin_category_store', 'uses' => 'Admin\CategoryController@store']);
    Route::patch('categories', ['as' => 'admin_category_update', 'uses' => 'Admin\CategoryController@update']);

    //admin reviews
    Route::get('reviews', ['as' => 'admin_review_index', 'uses' => 'Admin\ReviewController@index']);
    Route::get('reviews/{id}', ['as' => 'admin_review_show', 'uses' => 'Admin\ReviewController@show']);
    Route::post('reviews/{id}', ['as' => 'admin_review_update', 'uses' => 'Admin\ReviewController@update']);
    Route::delete('reviews/{id}', ['as' => 'admin_review_destroy', 'uses' => 'Admin\ReviewController@destroy']);

    //admin orders
    Route::get('orders', ['as' => 'admin_order_index', 'uses' => 'Admin\OrderController@index']);
    Route::get('orders/{id}/edit', ['as' => 'admin_order_edit', 'uses' => 'Admin\OrderController@edit']);
    Route::post('orders/{id}', ['as' => 'admin_order_update', 'uses' => 'Admin\OrderController@update']);

    //admin users
    Route::get('users', ['as' => 'admin_user_index', 'uses' => 'Admin\UserController@index']);
    Route::get('users/{id}/edit', ['as' => 'admin_user_edit', 'uses' => 'Admin\UserController@edit']);
    Route::post('users/{id}', ['as' => 'admin_user_update', 'uses' => 'Admin\UserController@update']);
    Route::delete('users/{id}', ['as' => 'admin_user_destroy', 'uses' => 'Admin\UserController@destroy']);

//    Route::resource('/admin/product', 'ProductController');
//    Route::resource('/admin/customers', 'CustomerController');
}); // End of authed route group.

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


//Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');


// oAuth Routes for facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@handleProviderCallback');
