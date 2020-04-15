<?php

namespace App\Providers;

use App\Area;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\{AreaComposer, NavigationComposer};

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer(['components.nav-top', 'components.nav-sidebar'], NavigationComposer::class);

        View::composer(['listings.partials.forms._categories'], function ($view) {
            $categories = cache()->remember('categories.list', 60*60*24, function() {
                return  Category::get()->totree();
            });
            $view->with(compact('categories'));
        });

        View::composer(['listings.partials.forms._areas'], function ($view) {
            $areas = cache()->remember('areas.list', 60*60*24, function() {
                return Area::get()->toTree();
            });
            $view->with(compact('areas'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }
}
