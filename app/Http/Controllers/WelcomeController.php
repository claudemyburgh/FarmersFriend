<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\Listing;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{


    /**
     * @param Area $area
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Area $area)
    {
        $categories = Category::withListingsInArea($area)->get()->toTree();


        return view('frontpage', compact('categories'));

    }


}
