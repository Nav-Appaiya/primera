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

// homepage
Route::get('/', [
    'as' => 'homepage',
    'uses'=>'MainController@index'
]);

// login
Route::get('auth/login', [
    'as'=>'login',
    'uses'=>'Auth\AuthController@getLogin'
]);
Route::post('auth/login', 'Auth\AuthController@postLogin');

// logout
Route::get('auth/logout', [
    'as'=>'logout',
    'uses'=>'Auth\AuthController@getLogout'
]);

// register
Route::get('auth/register', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', 'Auth\AuthController@postRegister');

// admin
Route::get('/admin', [
    'as' => 'admin',
    'uses' => 'ProductController@newProduct'
]);

// admin_product_new
Route::get('/admin/product/new', [
    'as' => 'admin_product_new',
    'uses' => 'ProductController@newProduct'
]);

// admin_product_index
Route::get('/admin/products', [
    'as' => 'admin_product_index',
    'uses' => 'AdminController@products'
]);

// admin_product_destroy
Route::get('/admin/product/destroy/{id}', [
    'as'=>'admin_product_destroy',
    'uses'=>'ProductController@destroy'
]);
// admin_product_detail
Route::get('/admin/product/{id}', [
    'as' => 'admin_product_detail',
    'uses' => 'ProductController@index'
]);
// admin_product_edit
Route::get('/admin/product/{product}/edit/', [
    'as' => 'admin_product_edit',
    'uses' => 'ProductController@edit'
]);
// admin_product_save
Route::post('/admin/product/save', [
    'as' => 'admin_product_save',
    'uses' => 'ProductController@add'
]);
// product_detail
Route::get('/product/{id}', [
    'as' => 'product_detail',
    'uses' => 'ProductController@detail'
]);
// product_add
Route::get('/product/{id}/add', [
    'as' => 'product_add',
    'uses' => 'ProductController@add'
]);
// category_detail
Route::get('/category/{id}', [
    'as' => 'category_detail',
    'uses' => 'MainController@category'
]);

// Pages routes
Route::get('/pages/{pageId}', 'MainController@page');

Route::resource('orders', 'OrderController');

// Winkelwagen

Route::auth();

Route::get('/home', 'MainController@index');
Route::get('/admin', 'AdminController@index');
