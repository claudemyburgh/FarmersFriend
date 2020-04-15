<?php

namespace App\Providers;

use App\Area;
use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Area::creating(function ($area) {
            $prefix = $area->parent ? $area->parent->name . ' ' : '';
            $area->slug = Str::slug($prefix . $area->name);
        });

        Category::creating(function ($category) {
            $prefix = $category->parent ? $category->parent->name . ' ' : '';
            $category->slug = Str::slug($prefix . $category->name);
        });
    }
}
