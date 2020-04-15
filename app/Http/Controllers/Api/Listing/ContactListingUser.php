<?php

namespace App\Http\Controllers\Api\Listing;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;
use App\Listing;
use App\Mail\ListingContactCreated;
use App\Mail\ListingContactThankYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactListingUser extends Controller
{
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

        Mail::to($request->user())->queue(
            new ListingContactThankYou($request->user())
        );

        return redirect()->back()->withSuccess("We have sent your message to {$listing->user->name}");
    }
}
