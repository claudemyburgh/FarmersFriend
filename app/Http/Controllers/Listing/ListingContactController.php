<?php

namespace App\Http\Controllers\Listing;

use App\Area;
use App\Listing;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;
use App\Mail\ListingContactCreated;

class ListingContactController extends Controller
{
    /**
     * ListingContactController constructor.
     */
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    /**
     * @param StoreListingContactFormRequest $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing)
    {
        Mail::to($listing->user)->queue(
            new ListingContactCreated($listing, $request->user(), $request->message)
        );

        return back()->withSuccess("We have sent your message to {$listing->user->name}");
    }
}
