<?php


Route::social();
Route::legal();
Route::auth(['verify' => true]);
Route::frontend();





















//Route::group(['prefix' => 'api/test/'], function () {
//
//    Route::get('areas', 'AreasController@index')->name('areas.index');
////    Route::get('/listings', 'Api\Listing\ListingsController@index');
//
//});


//Route::get('/braintree/token', 'BraintreeController@token');



//Route::group(['middleware' => ['auth:sanctum', 'verified'], 'as' => 'api.dashboard.', 'namespace' => 'Api\Dashboard', 'prefix' => 'dashboard'], function () {
//
//    Route::get('listings-chart', 'ChartsController@listings')->name('chart.listing');
//    Route::get('unpublished-chart', 'ChartsController@unpublished_listings')->name('chart.unpublished');
//
//});
