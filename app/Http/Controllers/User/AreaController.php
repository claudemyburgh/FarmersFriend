<?php


namespace App\Http\Controllers\User;


use App\Area;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{

    /**
     * @param Area $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Area $area)
    {
        session()->put('area', $area->slug);

        return redirect()->route('welcome', [$area]);
    }

}
