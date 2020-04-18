<?php

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function() {

    Route::get('areas', 'AreasController@index')->name('areas.index');

    Route::get('categories', 'Categories\CategoriesController@index')->name('categories.index');

    Route::apiResource('{area}/listings', 'Listing\ListingsController');

    Route::post('listing/{listing}/upload', 'Listing\ListingImageController@store')->name('listing.image.upload');

    Route::post('{listing}/user/message', 'Listing\ContactListingUser@store')->name('listing.message.friends');

});

Route::group(['prefix' => '{area}/categories/{category}', 'as' => 'api.'], function () {

    Route::get('/listings', 'Listing\ListingsController@index')->name('listings.index');

});

