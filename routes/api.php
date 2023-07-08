<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
    'namespace'=>'App\Http\Controllers',
    // 'prefix' => 'auth'

], function ($router) {
/*
|--------------------------------------------------------------------------
| Web Route / AuthController
|--------------------------------------------------------------------------
*/
    Route::get('get-product-component-data'                 , 'ApiController@getProductComponentData');

    Route::get('get-tab-component-data-latest'              , 'ApiController@getTabComponentDataLatest');

    Route::get('get-tab-component-data-best-seller'         , 'ApiController@getTabComponentDataBestSeller');

    Route::get('get-tab-component-data-top-rated'           , 'ApiController@getTabComponentDataTopRated');

    Route::get('get-tab-component-data-featured'            , 'ApiController@getTabComponentDataFeatured');

    Route::get('shop-main-content-data'                     , 'ApiController@getShopMainContentData');

    Route::get('get-product-single-data'                    , 'ApiController@getProductSingleData');

    Route::get('get-product-single-more-products'           , 'ApiController@getProductSingleMoreProducts');

    Route::get('get-order-details'                          , 'ApiController@getOrderDetails');

    Route::get('get-product-best-seller-data'               , 'ApiController@getProductsBestSellerData');

    Route::get('get-product-single-tab-nav-data'            , 'ApiController@getProductSingleTabnavData');

    Route::get('get-product-single-related-products-data'   , 'ApiController@getProductSingleRelatedProductsData');

    Route::get('get-product-category-data'                  , 'ApiController@getProductCategoryWrapData');

    Route::get('get-load-more-data'                         , 'ApiController@getLoadMoreData');

    Route::get('apply-coupon-code'                          , 'ApiController@applyCouponCode');

});
