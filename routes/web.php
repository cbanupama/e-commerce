<?php

Route::get('/', 'WelcomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Administrator

Route::namespace('Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});