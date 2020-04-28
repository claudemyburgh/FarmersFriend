<?php

namespace App\Providers;

use App\Observers\UserSocialObserver;
use App\UserSocial;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
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
        UserSocial::observe(UserSocialObserver::class);
    }
}
