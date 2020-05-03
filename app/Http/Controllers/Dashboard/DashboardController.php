<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * ListingContactController constructor.
     */
    public function __construct()
    {
        return $this->middleware(['auth:sanctum']);
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view ('dashboard.index');
    }

}
