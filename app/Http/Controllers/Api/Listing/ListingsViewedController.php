<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Resources\Listing\ListingsCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingsViewedController extends Controller
{
    const INDEX_LIMIT = 10;

    /**
     * ListingViewedController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $listings = $request->user()
            ->viewedListings()->with(['area', 'user'])
            ->orderByPivot('updated_at', 'desc')
            ->isLive()
            ->take(self::INDEX_LIMIT)
            ->get();

        return new ListingsCollection($listings);
    }
}
