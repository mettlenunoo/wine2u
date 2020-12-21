<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function(){


    Route::get('/user', 'apiController@profile'); // USER REGISTRATION
    Route::get('/user/wishlist', 'apiController@getWishList'); // USER REGISTRATION
    Route::get('/user/orders', 'apiController@getOrders'); // USER REGISTRATION
    Route::post('/user/changepassword', 'apiController@changepassword'); // USER REGISTRATION
    Route::post('/user/update', 'apiController@userUpdate'); // USER REGISTRATION
    Route::post('/image-upload', 'apiController@image_upload');
    Route::post('/user/referralcode', 'apiController@addEditReferralCode'); // USER REGISTRATION
    //Route::post('/checkout/user', 'apiController@checkout_store'); //Checkout
    Route::get('/logout', 'apiController@logout');

    

});


// SHIPPING
Route::get('/shipping', 'apiController@all_shipping_address'); 
Route::post('/shipping', 'apiController@store_shipping_address'); 
Route::get('/shipping/{id}', 'apiController@show_shipping_address');
Route::get('/shipping/{id}/edit', 'apiController@edit_shipping_address'); 
Route::put('/shipping/{id}', 'apiController@update_shipping_address');
Route::delete('/shipping/{id}', 'apiController@delete_shipping'); 


Route::get('/', 'apiController@all_products'); // ALL PRODUCTS
Route::get('/products', 'apiController@products'); //  PRODUCTS
Route::get('/menu', 'apiController@menu'); //  PRODUCTS
Route::get('/all-products', 'apiController@all_products'); // ALL PRODUCTS
Route::get('/all-products/{slug}', 'apiController@parent_cat_products'); // PARENT CATEGORY PRODUCTS
Route::get('/all-products/{parent}/{slug}', 'apiController@sub_cat_products'); // SUB CATEGORY PRODUCTS
Route::get('/products/{slug}', 'apiController@single_products'); // SINGLR PRODUCT
Route::get('/categories', 'apiController@all_categories'); // ALL CATEGORIES
Route::get('/review', 'reviewController@index'); // ALL CATEGORIES
Route::post('/review/add', 'reviewController@store'); // ALL CATEGORIES
Route::delete('/review/delete/{id}', 'reviewController@destroy'); // ALL CATEGORIES
Route::post('/wishlist/add', 'apiController@wishList'); // ALL CATEGORIES
Route::delete('/wishlist/delete/{id}', 'apiController@removeWishList'); // ALL CATEGORIES
Route::post('/user/login', 'apiController@login'); // USER REGISTRATION
Route::post('/user/register', 'apiController@userRegister'); // USER REGISTRATION
Route::post('/coupon', 'apiController@setCoupon'); // USER REGISTRATION
Route::get('/shipping/price/{zone}/{weight}', 'apiController@shippingPrice'); // USER REGISTRATION
Route::post('/checkout', 'apiController@checkout_store'); //Checkout

// Shop Settings
Route::get('/shop_settings', 'apiController@shop_settings'); 


// BLOG
Route::get('/blogs', 'apiController@blog'); 
Route::get('/blogs/{slug}', 'apiController@single_blog'); 
Route::get('/blog/category', 'apiController@all_blog_categories'); 

// Ads
Route::get('/ads', 'apiController@ads'); 


// PAYMENT METHOD
Route::post('/checkout/payment/ravepay', 'apiController@ravepay');
Route::post('/checkout/payment/paypal', 'apiController@paypal');
//Route::get('/checkout/payment/expresspay', 'publicController@expresspay');
Route::post('/checkout/payment/mpower', 'apiController@mpower');
//Route::get('/expresspay/processor', 'publicController@expresspay_processor');













