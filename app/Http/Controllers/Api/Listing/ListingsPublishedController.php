<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Resources\Listing\ListingsCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingsPublishedController extends Controller
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
        $listings = $request->user()->listings()->isNotExpired()->with(['area', 'media', 'user'])->isLive()->latestFirst()->paginate(10);

        return new ListingsCollection($listings);

    }
}
