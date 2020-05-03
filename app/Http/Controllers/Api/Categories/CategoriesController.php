<?php

namespace App\Http\Controllers\Api\Categories;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoriesCollection;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = cache()->remember('api.categories', 60*60 , function() {
            return Category::get()->toTree()->orderBy('name');
        });

        return new CategoriesCollection($categories);
    }
}
