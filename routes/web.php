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

// Route::get('/', function () {
//     return view('welcome');
// });



 // ALWAY MAKE SURE DECLARED RESOURCE  FIRST
Route::get('/admin','Auth\LoginController@showAdminLogin')->name('admin');
Route::resource('/admin/blog/categories','blogCategoryController');
Route::resource('/admin/blog','blogController');
Route::resource('/admin/page','pageController');
Route::get('/admin/login','userAdminController@index')->name('admin/login');
Route::resource('/admin/category','categoryController');
Route::resource('/admin/attribute','attributeController');
Route::resource('/admin/slider','sliderController');
Route::resource('/admin/ads','adsController');
Route::resource('/admin/brand','brandController');

Route::get('/admin/user/changepassword','userController@changepassword');
Route::post('/admin/user/updatepassword', 'UserController@updatepassword');
Route::post('/subscribes', 'publicController@subscriber');


Route::resource('/admin/user','userController');
Route::resource('/admin/subscribers','subscriberController');
Route::resource('/admin/paymethod','paymentMethodController');
Route::resource('/admin/product','productController');
Route::resource('/admin/order','orderController');

// coupon
Route::resource('/admin/coupon','couponController');
Route::post('/addcoupon', 'publicController@addcoupon');

// logout
Route::get('/admin/logout','Auth\LoginController@logout')->name('/admin/logout');

Route::resource('/admin/wine','wineController');
Route::resource('/admin/offer','offerController');
Route::resource('/admin/grape','grapeController');
Route::resource('/admin/pair','pairingController');
Route::get('/admin/country/region/{id}/edit','countryController@editRegion');
Route::get('/admin/country/region/create','countryController@createRegion');
Route::resource('/admin/country','countryController');


Route::resource('/admin/shipping/rate','shippingController');
Route::resource('/admin/shipping/country','shippingCountryController');
Route::resource('/admin/setup/shop','setupController');

// Product
Route::get('/', 'comingSoonController@coming_soon');
//Route::get('/', 'publicController@index');
//Route::get('/index', 'comingSoonController@coming_soon');
Route::get('/index', 'publicController@landing');
Route::get('/site', 'publicController@index')->name("index");

// About
Route::get('/about', 'publicController@about');


// Search
Route::get('/products/search/{keywords}', 'publicController@search_product'); 
Route::get('/search', 'publicController@search'); 

Route::get('/products', 'publicController@products')->name("products");
Route::get('/filter_products', 'publicController@filter_products');
Route::get('/products/{slug}', 'publicController@single_products');

// subscribe 
Route::post('/subscribe', 'comingSoonController@subscribe')->name("subscribe");

// Blog
Route::get('/blog', 'publicController@blog');
Route::get('/blog/{slug}', 'publicController@single_blog');
Route::get('/pairing', 'publicController@pairing');
Route::get('/pairing/{id}', 'publicController@single_pairing');

// Videos 
Route::get('/videos', 'publicController@allVideos');
Route::get('/video', 'publicController@singleVideo');


// Age Verification
Route::get('/age-verification', 'ageVerificationController@ageVerificationPage');
Route::post('/age-verification', 'ageVerificationController@ageVerification')->name("age-verification");
Route::get('/age-verification/below-18', 'ageVerificationController@sorry');

// Cart
Route::get('/product/addtocard/{id}/{qty}', 'publicController@AddToCart');
Route::get('/product/changevarprod/{id}', 'publicController@changevarproduct');
Route::get('/cart/delete/{id}', 'publicController@deleteCartPage');  

// sign up
Route::get('/signup', 'publicController@user_signup');
Route::post('/signup', 'publicController@userRegister')->name("customer-signup");

// login
Route::get('/sign-in', 'publicController@user_sign_in');
Route::post('/sign-in', 'publicController@login')->name("customer-sign-in");

// Wishlistss
Route::post('/wishlist', 'publicController@wishList');

// Social Media Login
Route::get('/sign-in/facebook/redirect', 'socialiteController@facebook_redirect');
Route::get('/sign-in/facebook', 'socialiteController@facebook_Callback');

Route::get('/sign-in/google/redirect', 'socialiteController@google_redirect');
Route::get('/sign-in/google', 'socialiteController@google_Callback');

//  User Account

Route::prefix('/account')->name('account.')->group(function(){

    Route::get('/', 'customerContoller@profile');
    Route::get('/user-account', 'customerContoller@profile');
    Route::get('/logout', 'customerContoller@logout');
    Route::post('/update_profile', 'customerContoller@userUpdate');
    Route::post('/profile/changepassword', 'customerContoller@changepassword');

});

// Country
Route::get('/country/{slug}', 'publicController@single_country');

// Review
Route::post('/review/add', 'publicController@rating');
Route::get('/product/review', 'publicController@reviews'); 

// checkout
Route::get('/checkout', 'publicController@checkout');
Route::post('/checkout/create', 'publicController@checkout_store')->name("checkout/create");

// PAYMENT METHOD
Route::get('/checkout/payment/ravepay', 'publicController@ravepay');
Route::get('/checkout/payment/paypal', 'publicController@paypal');
Route::get('/checkout/payment/expresspay', 'publicController@expresspay');
Route::get('/checkout/payment/mpower', 'publicController@mpower');
Route::get('/checkout/payment/paystack', 'publicController@paystack');
Route::get('/expresspay/processor', 'publicController@expresspay_processor');
Route::post('/paystack', 'publicController@redirectToGateway')->name('pay');


// Coupon 
Route::post('/coupon', 'publicController@addcoupon')->name("coupon");

// Shipping 
Route::get('/checkout/rate/{zone}', 'publicController@checkoutrate');



// Route::post('/index', 'publicController@selectCountry');
// COOKIES
Route::get('/cookies', 'publicController@accept_cookie');


// Route::get('{country}', 'publicController@countryInfo');
// Route::get('/{country}/checkout', 'publicController@checkout');
// Route::get('/{country}/product', 'publicController@shop');
// Route::get('{country}/cart', 'publicController@cart');
// Route::get('/{country}/about', 'publicController@about');
// Route::get('/{country}/blog', 'publicController@blog');
// Route::get('/{country}/store', 'publicController@shop');
// Route::get('{country}/thankyou', 'publicController@thankyou');
// Route::get('{country}/contact', 'publicController@contact_us');
// Route::get('{country}/tunnel', 'publicController@tunnel');
// Route::get('{country}/search', 'publicController@searchResult');
// Route::post('/product/search', 'publicController@search');



// Route::get('/{country}/about/term_condition', 'publicController@term_condition');
// Route::get('/{country}/about/privacy_policy', 'publicController@privacy_policy');
// Route::get('/{country}/about/deliveryinfo', 'publicController@deliveryinfo');
// Route::get('/{country}/about/return_exchanges', 'publicController@return_exchanges');

// //     
// Route::post('/checkout/create', 'publicController@checkout_store');
// Route::post('/checkout/user', 'publicController@checkout_user');
// Route::get('/{country}/blog/{slug}', 'publicController@blog_single');
// Route::get('/{country}/page/{slug}', 'publicController@page');



// Route::get('/{country}/store/{slug}', 'publicController@shopCategory');
// Route::get('/{country}/store/{category}/{slug}', 'publicController@subCategory');
// //Route::get('/store/{category}/{subcategory}/{slug}', 'publicController@singleProduct');
// Route::get('/{country}/product/{slug}', 'publicController@singleProduct');


// // CHECKOUT
// //Route::get('/account', 'publicController@account');
// //Route::get('/edit-account', 'publicController@editaccount');
// //Route::get('/orders', 'publicController@orders');
// //Route::get('/privacy-policy', 'publicController@privacypolicy');

// // CHECKOUT FOR LOGIN USER

// Route::get('/checkout/rate/{zone}/{weight}', 'publicController@checkoutrate');

// // CART
// Route::get('/product/addtocard/{id}', 'publicController@getAddToCart');
// Route::get('/product/delete/{id}', 'publicController@deleteCart');
// Route::get('/product/addtocard/{id}/{qty}', 'publicController@AddToCart');
// Route::get('/product/changevarprod/{id}', 'publicController@changevarproduct');
// Route::get('/cart/delete/{id}', 'publicController@deleteCartPage');  // for cart page



// // CUSTOMER  LOGIN INFO / SIGN UP
// Route::get('/{country}/user/login', 'Auth\CustomerLoginController@clientlogin');
// Route::get('/{country}/sign-up', 'publicController@clientsignup');
// // ---- FORGOTTEN PASSWORD
// Route::get('/{country}/user/forgottenpassword', 'forgotten_password@forgottenPassword');
// Route::post('/user/resetlink', 'forgotten_password@reset_link');
// Route::get('/{country}/user/reset/{token}', 'forgotten_password@reset_password');
// Route::post('/user/reset_changepassword', 'forgotten_password@change_passwod');

// // BACKEND CUSTOMER
// Route::get('/admin/customers','customersController@index');
// Route::get('/admin/customer/order/{customer_id}','customersController@orders');





// Route::post('/sign-up', 'publicController@addcustomer');
// //Route::post('/user/login', 'publicController@login');
// Route::post('/user/login', 'Auth\CustomerLoginController@userLogin');
// Route::post('/checkout/user/login', 'Auth\CustomerLoginController@checkoutUserLogin');


// // USER DASHBOARD
// Route::get('{country}/account', 'customerContoller@index');
// Route::get('{country}/account/orders', 'customerContoller@show_orders');
// Route::get('{country}/account/profile/edit/', 'customerContoller@editShow');
// Route::POST('account/profile/update', 'customerContoller@updateProfile');
// Route::get('/account/logout', 'Auth\CustomerLoginController@logout')->name('/account/logout');

// // PAYMENT METHOD
// Route::get('{country}/checkout/payment/ravepay', 'publicController@ravepay');
// Route::get('{country}/checkout/payment/paypal', 'publicController@paypal');
// Route::get('{country}/checkout/payment/expresspay', 'publicController@expresspay');
// Route::get('{country}/checkout/payment/mpower', 'publicController@mpower');
// Route::get('/expresspay/processor', 'publicController@expresspay_processor');



// Route::get('/category', 'publicController@productcategory');
// Route::get('/thankyou', 'publicController@thankyou');


//Route::resource('/account','customerContoller');





Route::get('/admin/account/settings','setupController@shopSettings');
Route::get('/admin/change/shop/{id}', 'setupController@changeShop');
Route::post('/admin/shipping/deleteall','shippingController@deleteAll');
Route::post('/admin/shipping/country/deleteall', 'shippingCountryController@destroyAll');
Route::post('/admin/product/addproduct', 'productController@addproduct');
Route::post('/admin/product/updateproduct','productController@update_product');
Route::post('/admin/order/updatestatus','orderController@updatestatus');
Route::post('/admin/order/updateinvoice','orderController@updateinvoice');
Route::get('/admin/dashboard','orderController@dashboard');
Route::post('/admin/product/delete_v', 'productController@destroy_v_product');
Route::post('/admin/product/gallery', 'productController@destroy_gallery');
Route::post('/admin/shipping/country/import', 'shippingCountryController@importfromexcel');
Route::post('/admin/shipping/rate/import', 'shippingController@importfromexcel');

Route::get('/admin/report/{search}', 'ReportController@search');
Route::resource('/admin/report', 'ReportController');

// Payment Gateway
Route::resource('/admin/payment-gateway','PaymentGatewayController');


//Route::resource('user/dashboard','orderController');


//Route::get('/admin/user/create', 'userController@create');



//Route::resource('categories','categoryController');s

/*
|   
|  END OF BACKEDND ROUTER
|

*/
Auth::routes();



// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


//Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/home', 'HomeController@index')->name('home');
