<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PageController@index')->name('home');
Route::get('/contact','PageController@contact')->name('contact');
Route::get('/about','PageController@about')->name('about');
Route::get('/category/{id}','voyager\ProductController@showAll')->name('showAll'); // all products
route::get('/category/{category}/{product}', 'voyager\ProductController@display')->name('product'); // one product
route::get('/search/{slug}', 'voyager\ProductController@displayBySearch')->name('productBySearch'); // one product by searching
route::get('/guestCheckout/information','CheckoutController@index')->name('guestCheckout-info'); // for guests
route::get('/success' ,'PageController@success')->name('success'); // success

route::get('/checkout/information', function(){
     if(Cart::count() == 0){
            return redirect()->route('home');
    }
    return view('pages.checkout-information');
})->name('checkout-info')->middleware('auth'); // for users

route::get('/checkout', function(){
    return view('pages.checkout');
})->name('checkout');

// shoppingcart
route::get('/cart','CartController@index')->name('cart.index');
route::post('/cart/{id}','CartController@store')->name('cart.store');
route::patch('/cart/{product}','CartController@update')->name('cart.update');
route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');


// login/registration
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/checkout', 'UserController@login')->name('checkoutLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('products', 'voyager\ProductController');
Route::resource('users', 'UserController');
Route::resource('payment', 'CheckoutController');

//ajax
route::get('/price', function(){
    return response()->json(array('success' => true));
})->name('showPrice'); 
Route::get('/search', 'PageController@search')->name('search');
//mollie
Route::name('webhooks.mollie')->post('webhooks/mollie', 'MollieWebhookController@handle');


// admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
