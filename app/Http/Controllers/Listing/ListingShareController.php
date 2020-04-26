<?php

namespace App\Http\Controllers\Listing;

use Mail;
use App\{Area, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingShareFormRequest;
use App\Mail\ListingShared;

class ListingShareController extends Controller
{
    /**
     * ListingShareController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Area $area, Listing $listing)
    {
        return view('listings.share.index', compact('listing'));
    }

    /**
     * @param StoreListingShareFormRequest $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function store(StoreListingShareFormRequest $request, Area $area, Listing $listing)
    {
        collect(array_filter($request->emails))->each(function ($email) use ($listing, $request) {
            Mail::to($email)->queue(
                new ListingShared($listing, $request->user(), $request->message)
            );
        });

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('Listing shared successfully.');
    }
}
