<?php

Route::get('/', 'WelcomeController@index');
Route::get('/browse/{categorySlug}', 'WelcomeController@browse')->name('browse');
Route::get('/item/{productSlug}', 'WelcomeController@item')->name('item');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
    Route::resource('cart', 'CartController');
    Route::resource('order', 'OrderController');
});


// Administrator

Route::namespace('Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});
