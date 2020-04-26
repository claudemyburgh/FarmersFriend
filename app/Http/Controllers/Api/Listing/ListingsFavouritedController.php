<?php

namespace App\Http\Controllers\Api\Listing;

use App\Area;
use App\Http\Resources\Listing\ListingsCollection;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ListingsFavouritedController extends Controller
{
    /**
     * ListingFavouriteController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * @param Request $request
     * @return ListingsCollection
     */
    public function index(Request $request)
    {
        $listings = $request->user()->favouriteListings()->isNotExpired()->with(['user', 'area'])->paginate(10);

        return new ListingsCollection($listings);
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

        return redirect()->back()->withSuccess('Listing added to favourites.');
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

        return redirect()->back()->withSuccess('Listing removed to favourites.');
    }
}
