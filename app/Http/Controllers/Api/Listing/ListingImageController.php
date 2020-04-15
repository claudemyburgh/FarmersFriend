<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Controllers\Controller;
use App\Listing;
use Illuminate\Http\Request;

class ListingImageController extends Controller
{

    /**
     * @param Request $request
     * @param Listing $listing
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function store(Request $request, Listing $listing)
    {
        $details = $listing->addMedia($request->file)->toMediaCollection('listing');

        return response()->json([
            'id' => $details->id,
            'size' => $details->size,
            'name' => $details->name,
            'collection_name' => $details->collection_name
        ]);
    }
}
