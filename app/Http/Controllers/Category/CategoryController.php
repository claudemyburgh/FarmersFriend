<?php

namespace App\Http\Controllers\Category;

use App\{Area, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
     * @param Area $area
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Area $area)
    {

        $categories =  Category::withListingsInArea($area)->get()->toTree();

        return view('categories.index', compact('categories'));
    }
}
