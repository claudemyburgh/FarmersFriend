<?php

namespace App\Providers;

use App\RouteMethods\FrontendRoutes;
use App\RouteMethods\LegalRoutes;
use App\RouteMethods\SocialRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteMethodsServiceProvider extends ServiceProvider
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
        Route::mixin(new FrontendRoutes);
        Route::mixin(new SocialRoutes);
        Route::mixin(new LegalRoutes);
    }
}
