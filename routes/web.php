<?php

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
//Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::post('/cart/AddQtyInCart/{product}', 'CartController@AddQtyInCart')->name('cart.AddQtyInCart');
Route::post('/cart/LessQtyInCart/{product}', 'CartController@LessQtyInCart')->name('cart.LessQtyInCart');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
Route::get('/thankyounon', 'ConfirmationController@nonmember')->name('confirmation.nonmember');
Route::get('/thankyounew', 'ConfirmationController@newmember')->name('confirmation.newmember');

// reports
Route::get('/orders/export', 'OrdersController@export')->name('orders.export');
Route::get('/orders/exportSlip/{order}', 'OrdersController@exportSlip')->name('orders.exportSlip');
Route::get('/products/export', 'ProductsController@export')->name('products.export');
Route::get('/users/export', 'UsersController@export')->name('users.export');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');
// Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});
