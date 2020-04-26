<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Resources\Listing\ListingsCollection;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingUnpublishedController extends Controller
{
    /**
     * ListingPublishedController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @param Request $request
     * @return ListingsCollection
     */
    public function index(Request $request)
    {
        $listings = $request->user()->listings()->with(['area', 'media', 'user'])->isNotLive()->latestFirst()->paginate(10);

        return new ListingsCollection($listings);

    }
}
