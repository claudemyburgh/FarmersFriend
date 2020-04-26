<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;

class ListingViewedController extends Controller
{
    const INDEX_LIMIT = 12;

    /**
     * ListingViewedController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.listings.viewed.index', [
            'indexLimit' => self::INDEX_LIMIT,
        ]);
    }
}
