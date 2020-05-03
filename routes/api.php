<?php

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});




Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function() {

    Route::get('areas', 'AreasController@index')->name('areas.index');

    Route::get('categories', 'Categories\CategoriesController@index')->name('categories.index');

    Route::apiResource('{area}/listings', 'Listing\ListingsController', ['except' => ['index']]);

    Route::get('listings/published', 'Listing\ListingsPublishedController@index')->name('listings.published.index');
    Route::get('listings/unpublished', 'Listing\ListingsUnpublishedController@index')->name('listings.unpublished.index');
    Route::get('listings/favourited', 'Listing\ListingsFavouritedController@index')->name('listings.favourited.index');
    Route::get('listings/viewed', 'Listing\ListingsViewedController@index')->name('listings.viewed.index');

    Route::post('listing/{listing}/upload', 'Listing\ListingImageController@store')->name('listing.image.upload');
    Route::delete('listing/{listing}', 'Listing\ListingImageController@destroy')->name('listing.image.destroy');

    Route::post('{listing}/user/message', 'Listing\ContactListingUser@store')->name('listing.message.friends');

});

Route::group(['prefix' => '{area}/categories/{category}', 'as' => 'api.'], function () {

    Route::get('/listings', 'Listing\ListingsController@index')->name('listings.index');

});

Route::group(['middleware' => ['auth:sanctum', 'verified'],
    'as' => 'api.dashboard.', 'namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {

    Route::get('listings-chart', 'ChartsController@listings')->name('chart.listing');

    Route::get('profile', 'Profilecontroller@index')->name('profile.index');
    Route::post('profile', 'Profilecontroller@store')->name('profile.store');

    Route::get('profile/password', 'ProfilePasswordController@index')->name('profile.password.index');
    Route::post('profile/password', 'ProfilePasswordController@store')->name('profile.password.store');



});
