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


Route::get('/', [
    'as' => 'homepage',
    'uses' => 'MainController@index'
]);

Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'ContactController@index'
]);

Route::get('/payment', [
    'as' => 'payment',
    'uses' => 'MainController@payment'
]);

Route::get('/order/payment', [
    'as' => 'order.payment',
    'uses' => 'MainController@payed'
]);


Route::get('auth/login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

Route::get('auth/register', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/product/{id}', [
    'as' => 'product_detail',
    'uses' => 'ProductController@detail'
]);

Route::get('/product/{id}/add', [
    'as' => 'product_add',
    'uses' => 'ProductController@add'
]);

Route::get('/category/{id}', [
    'as' => 'category_detail',
    'uses' => 'MainController@category'
]);
Route::get('/categories', [
    'as' => 'categories_all',
    'uses' => 'ProductController@add'
]);


Route::get('/pages/{pageId}', 'MainController@page');


Route::get('/admin', 'AdminController@index');


Route::get('/cart', [
    'as' => 'cart',
    'uses' => 'CartController@index'
]);

Route::get('/cart/add/{id}', [
    'as' => 'cart.add',
    'uses' => 'CartController@addCart'
]);
Route::get('/cart/remove/{id}', [
    'as' => 'cart.remove',
    'uses' => 'CartController@removeCart'
]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/orders', [
        'as' => 'orders.index',
        'uses' => 'OrderController@index'
    ]);

    Route::get('/admin/orders/new', [
        'as' => 'orders.create',
        'uses' => 'OrderController@create'
    ]);

    Route::post('/admin/orders/store', [
        'as' => 'orders.store',
        'uses' => 'OrderController@store'
    ]);

    Route::get('/admin/orders/{order}/edit/', [
        'as' => 'orders.edit',
        'uses' => 'OrderController@edit'
    ]);

    Route::get('/admin/orders/{order}/show/', [
        'as' => 'orders.show',
        'uses' => 'OrderController@show'
    ]);

    Route::get('/admin/orders/{order}/destroy/', [
        'as' => 'orders.destroy',
        'uses' => 'OrderController@destroy'
    ]);

    Route::get('/admin', [
        'as' => 'admin',
        'uses' => 'AdminController@index'
    ]);


    Route::get('/admin/product/new', [
        'as' => 'admin_product_new',
        'uses' => 'ProductController@newProduct'
    ]);


    Route::get('/admin/products', [
        'as' => 'admin_product_index',
        'uses' => 'AdminController@products'
    ]);


    Route::get('/admin/product/destroy/{id}', [
        'as' => 'admin_product_destroy',
        'uses' => 'ProductController@destroy'
    ]);

    Route::get('/admin/product/{id}', [
        'as' => 'admin_product_detail',
        'uses' => 'ProductController@index'
    ]);

    Route::get('/admin/product/{product}/edit/', [
        'as' => 'admin_product_edit',
        'uses' => 'ProductController@edit'
    ]);

    Route::post('/admin/product/save', [
        'as' => 'admin_product_save',
        'uses' => 'ProductController@add'
    ]);

    Route::resource('/admin/customers', 'CustomerController');

});
