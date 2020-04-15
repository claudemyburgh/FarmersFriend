<?php

namespace App\Http\Controllers\Api\Categories;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoriesCollection;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::get()->toTree();

        return new CategoriesCollection($categories);
    }
}
