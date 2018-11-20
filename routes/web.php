<?php

Route::get('/', 'WelcomeController@index');
Route::get('/browse/{categorySlug}', 'WelcomeController@browse')->name('browse');
Route::get('/item/{productSlug}', 'WelcomeController@item')->name('item');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Administrator

Route::namespace('Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});
