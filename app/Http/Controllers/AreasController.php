<?php

namespace App\Http\Controllers;

use App\Area;


class AreasController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        $areas =  cache()->remember('areas', 60*60*24, function() {
            return Area::get()->toTree();
        });

        return view('areas', compact('areas'));
    }
}
