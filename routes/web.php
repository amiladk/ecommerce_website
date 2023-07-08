<?php

use Illuminate\Support\Facades\Route;

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

Route::group([

    'namespace'=>'App\Http\Controllers',

],function ($router) {

    /*
    |--------------------------------------------------------------------------
    | ViewController
    |--------------------------------------------------------------------------
    */

    Route::get('/'                              , 'ViewController@aryans')->name('home');

    Route::get('/product/{slug}'                , 'ViewController@productDefault');

    Route::get('/shop'                          , 'ViewController@shopPage')->name('shop');

    Route::get('/shop/{slug?}'                   , 'ViewController@shopPage');

    Route::get('/cart'                          , 'ViewController@cartPage');

    Route::get('/checkout'                      , 'ViewController@checkoutPage');

    Route::get('/contact-us'                    , 'ViewController@contatcusPage')->name('contact-us');

    Route::post('/checkout-form'                , 'ApiController@checkout');

    Route::get('/logout'                        , 'ApiController@logout');

    Route::post('/signup-form'                  , 'ApiController@signup');

    Route::post('/signin-form'                  , 'ApiController@signin');

    Route::get('/login-popup'                   , 'ViewController@loginPopup');

    Route::get('/order-success'                 , 'ViewController@orderSuccess')->name('order-success');

    Route::get('/404'                           , 'ViewController@errorPage')->name('notFound');

    Route::post('/review-form'                  , 'ApiController@review');

    Route::post('/contact-form'                 , 'ApiController@contact');

    Route::post('/newsletter-form'              , 'ApiController@newsletter');//use on aryans

    Route::get('/forget-password'               , 'ViewController@forgetPasswordPage')->name('forgetpassword');

    Route::get('/password-reset/{token}'        , 'ViewController@passwordResetPage')->name('passwordreset');

    Route::post('/forget-password-submit'       , 'ApiController@forgetPasswordSubmit')->name('forgetpasswordsubmit');

    Route::post('/password-reset-submit'        , 'ApiController@passwordResetSubmit')->name('passwordresetsubmit');

    Route::post('/edit-account-details'         , 'ProfileController@editAccountDetails')->name('edit-account-details');

    Route::get('/terms-and-condition'             , 'ViewController@termsConditionPage');

    Route::get('/faq'                           , 'ViewController@faqPage');

    Route::get('/return-policy'                 , 'ViewController@returnPolicyPage');

    Route::get('/privacy-policy'                , 'ViewController@privacyPolicyPage');

    Route::get('/about-us'                       , 'ViewController@aboutusPage');

    Route::get('/sitemap.xml'                    , 'ViewController@sitemap');


    /*
    |--------------------------------------------------------------------------
    | Others
    |--------------------------------------------------------------------------
    */

    Route::get('login/{provider}'               , 'SocialController@redirect');

    Route::get('login/{provider}/callback'      , 'SocialController@Callback');



});


Route::group([
    'middleware' => 'authorise',
    'namespace'  =>'App\Http\Controllers',

],function ($router) {

    /*
    |--------------------------------------------------------------------------
    | ProfileController
    |--------------------------------------------------------------------------
    */
    Route::get('/my-account'              , 'ProfileController@myAccountPage')->name('my-account');

    Route::any('/add-new-address'         , 'ProfileController@addNewAddress');

    Route::any('/add-new-phone'           , 'ProfileController@addNewPhoneNumber');

    Route::post('/remove-phone'           , 'ProfileController@removePhoneNumber');

    Route::post('/remove-address'         , 'ProfileController@removeAddress');

    Route::post('/set-default-address'    , 'ProfileController@setDefaultAddress');

    Route::post('/set-default-phone'      , 'ProfileController@setDefaultPhone');

    Route::post('/edit-address'           , 'ProfileController@editAddress');

    Route::post('/edit-phone'             , 'ProfileController@editPhone');


});


Route::group([
    'middleware' => 'authorisesignup',
    'namespace'  =>'App\Http\Controllers',

],function ($router) {

    Route::get('/signup'                        , 'ViewController@signupPage')->name('signup');

});

/*
|--------------------------------------------------------------------------
| Web Route /  Default route
|--------------------------------------------------------------------------
*/


//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect()->back()->with('success', 'Cache facade value cleared');
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return redirect()->back()->with('success', 'Reoptimized class loader</h1>');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return redirect()->back()->with('success', 'Routes cached');
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return redirect()->route('home')->with('success', 'Route cache cleared');
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return redirect()->route('home')->with('success', 'View cache cleared');
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return redirect()->route('home')->with('success', 'Clear Config cleared');
});


Route::any('{catchall}', function() {return redirect()->route('notFound');})->where('catchall', '.*');


