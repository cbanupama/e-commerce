<?php

Route::get('/', 'WelcomeController@index');
Route::get('/browse/{categorySlug}', 'WelcomeController@browse')->name('browse');
Route::get('/item/{productSlug}', 'WelcomeController@item')->name('item');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('cart', 'CartController');
});


// Administrator

Route::namespace('Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});
