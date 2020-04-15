<?php

namespace App\Http\Controllers\Api;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Resources\Area\AreaCollection;


class AreasController extends Controller
{
    public function index()
    {
        $areas = cache()->remember('api.areas', 60*60*24 , function() {
            return Area::get()->toTree();
        });
        return new AreaCollection($areas);
    }
}
