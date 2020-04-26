<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;

class ListingPublishedController extends Controller
{
    /**
     * ListingsPublishedController constructor.
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
        return view('user.listings.published.index');
    }
}
