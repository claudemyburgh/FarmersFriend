<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Resources\Area\AreaCollection;



class AreasController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
//        cache()->forget('areas');
        $areas =  cache()->remember('areas', 60*60*24, function() {
            return Area::get()->toTree();
        });



        return view('areas', compact('areas'));
    }
}
