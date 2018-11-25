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

Route::middleware('auth', 'role:admin')->namespace('Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});


Route::get('/make-admin', function () {

    $user = \App\User::where('email', '=', 'admin@example.com')->first();

   \App\Role::create([
       'user_id' => $user->id,
       'name' => 'admin'
   ]);
});
