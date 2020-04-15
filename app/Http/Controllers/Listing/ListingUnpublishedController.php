<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingUnpublishedController extends Controller
{
    /**
     * ListingUnpublishedController constructor.
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
        $listings = $request->user()->listings()->with(['area'])->isNotLive()->latestFirst()->paginate(10);

        return view('user.listings.unpublished.index', compact('listings'));
    }
}
