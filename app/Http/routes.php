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

// Default route for homepage {or testing authed stuff}
Route::get('/', 'MainController@index');

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Product admin routes
Route::get('/admin', 'A@newProduct');
Route::get('/admin/product/new', 'ProductController@newProduct');
Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
Route::resource('orders', 'OrderController');

Route::get('/admin/product/{id}', 'ProductController@index');
Route::get('/admin/product/{product}/edit/', 'ProductController@edit');

Route::post('/admin/product/save', 'ProductController@add');

// Product routes site
Route::get('/product/{id}', 'ProductController@detail');
Route::get('/category/{id}', 'MainController@category');

// Pages routes
Route::get('/pages/{pageId}', 'MainController@page');


// Winkelwagen

Route::auth();

Route::get('/home', 'MainController@index');
Route::get('/admin', 'AdminController@index');
