<?php

namespace App\Http\Controllers\Api\Categories;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoriesCollection;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = cache()->remember('api.categories', 60*60*24 , function() {
            return Category::get()->toTree();
        });

        return new CategoriesCollection($categories);
    }
}
