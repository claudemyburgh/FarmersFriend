<?php

//Auth::routes(['verify' => true]);

Route::auth(['verify' => true]);

//Route::group(['prefix' => 'api/test/'], function () {
//
//    Route::get('areas', 'AreasController@index')->name('areas.index');
////    Route::get('/listings', 'Api\Listing\ListingsController@index');
//
//});


Route::frontend();


//Route::get('/braintree/token', 'BraintreeController@token');



