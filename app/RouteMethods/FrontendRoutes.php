<?php


namespace App\RouteMethods;


class FrontendRoutes
{

    /**
     * Route::frontend()
     * @return \Closure
     */
    public function frontend ()
    {
        return function() {
            $this->get('/', 'WelcomeController@index');
            $this->get('areas', 'AreasController@index')->name('areas');

            $this->dashboard();

            $this->get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');
            $this->get('/{area}', 'WelcomeController@index')->name('welcome');
            $this->inArea();
        };
    }

    /**
     * Route in areas
     */
    protected function inArea ()
    {
        return function () {
            $this->group(['prefix' => '/{area}'], function() {

                $this->categories();

                $this->listings();

            });
        };
    }

    /**
     * Category
     */
    protected function categories ()
    {
        return function () {
            $this->group(['prefix' => '/categories'], function () {
                $this->get('/', 'Category\CategoryController@index')->name('category.index');

                $this->group(['prefix' => '/{category}'], function () {
                    $this->get('/listings', 'Listing\ListingController@index')->name('listings.index');
                });
            });
        };
    }

    /**
     * listings
     */
    protected function listings ()
    {
        return function () {

            $this->group(['prefix' => '/listings', 'namespace' => 'Listing'], function () {

                $this->get('/favourites', 'ListingFavouriteController@index')->name('listings.favourites.index');
                $this->post('/{listing}/favourites', 'ListingFavouriteController@store')->name('listings.favourites.store');
                $this->delete('/{listing}/favourites', 'ListingFavouriteController@destroy')->name('listings.favourites.destroy');

                $this->get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');

                $this->post('/{listing}/contact', 'ListingContactController@store')->name('listings.contact.store');

                $this->get('/{listing}/payment', 'ListingPaymentController@show')->name('listings.payment.show');
                $this->post('/{listing}/payment', 'ListingPaymentController@store')->name('listings.payment.store');
                $this->patch('/{listing}/payment', 'ListingPaymentController@update')->name('listings.payment.update');

                $this->get('/unpublished', 'ListingUnpublishedController@index')->name('listings.unpublished.index');

                $this->get('/published', 'ListingPublishedController@index')->name('listings.published.index');

                $this->get('/{listing}/share', 'ListingShareController@index')->name('listings.share.index');
                $this->post('/{listing}/share', 'ListingShareController@store')->name('listings.share.store');

                /**
                 * Auth routes
                 */
                $this->authenticatedListings();
            });

            $this->get('/listing/{listing}', 'Listing\ListingController@show')->name('listings.show');
        };
    }

    protected function authenticatedListings ()
    {
        return function () {
            $this->group(['middleware' => ['auth:sanctum', 'verified']], function () {

                $this->get('/create', 'ListingController@create')->name('listings.create');
                $this->post('/', 'ListingController@store')->name('listings.store');

                $this->get('/{listing}/edit', 'ListingController@edit')->name('listings.edit');
                $this->patch('/{listing}', 'ListingController@update')->name('listings.update');
                $this->delete('/{listing}', 'ListingController@destroy')->name('listings.destroy');

                $this->post('/{listing}/upload', 'ListingController@upload')->name('listings.upload');
            });
        };
    }

    /**
     * @return \Closure
     */
    protected function dashboard()
    {
        return function () {
            $this->group(['middleware' => ['auth:sanctum', 'verified'], 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
                $this->get('dashboard', 'DashboardController@index')->name('index');
            });
        };
    }



}
