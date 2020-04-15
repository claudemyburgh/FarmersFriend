<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingFavouriteController extends Controller
{
    /**
     * ListingFavouriteController constructor.
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
        $listings = $request->user()->favouriteListings()->with(['user', 'area'])->paginate(10);

        return view('user.listings.favourites.index', compact('listings'));
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function store(Request $request, Area $area, Listing $listing)
    {
        $request->user()->favouriteListings()->syncWithoutDetaching([$listing->id]);

        return back()->withSuccess('Listing added to favourites.');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function destroy(Request $request, Area $area, Listing $listing)
    {
        $request->user()->favouriteListings()->detach($listing);

        return back()->withSuccess('Listing removed to favourites.');
    }
}
