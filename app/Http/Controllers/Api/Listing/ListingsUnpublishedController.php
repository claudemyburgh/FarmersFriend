<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Resources\Listing\ListingsCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingsUnpublishedController extends Controller
{
    /**
     * ListingsPublishedController constructor.
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
        $listings = $request->user()->listings()->with(['area', 'media', 'user'])->isNotLive()->latestFirst()->paginate(10);

        return new ListingsCollection($listings);

    }
}
