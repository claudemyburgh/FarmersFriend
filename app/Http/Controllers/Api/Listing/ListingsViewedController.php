<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingViewedController extends Controller
{
    const INDEX_LIMIT = 10;

    /**
     * ListingViewedController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
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

        return view('user.listings.viewed.index', [
            'listings' => $listings,
            'indexLimit' => self::INDEX_LIMIT,
        ]);
    }
}
