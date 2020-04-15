<?php

namespace App\Providers;

use App\Listing;
use App\Observers\ListingObserver;
use Illuminate\Support\ServiceProvider;

class ListingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Listing::observe(ListingObserver::class);
    }
}
