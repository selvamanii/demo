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



Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@checkLogin');
Route::get('/logout', 'UserController@logout');

Route::get('/', 'ProductController@products');


Route::get('/cart/{id}', 'ProductController@savecart');
Route::get('/cart', 'ProductController@cart');
Route::get('/cart/delete/{id}', 'ProductController@deletecart');

Route::post('/order', 'ProductController@saveorder');
Route::get('/order/{id}', 'ProductController@order')->name('order');

//Route::post('/order/{id}/', 'ProductController@saveaddress');
//Route::post('/order/{id}', 'ProductController@saveaddress');

Route::post('/payment', 'ProductController@saveaddress');
Route::get('/orderlist', 'ProductController@orderlist');
Route::get('/orderlist/{id}', 'ProductController@orderview');












