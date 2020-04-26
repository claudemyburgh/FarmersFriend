<?php

namespace App\Http\Controllers\Api\Listing;

use App\Http\Controllers\Controller;
use App\Listing;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ListingImageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){

        $media = Media::find($id)->delete();

        return response()->json([
            'id' => $id,
            'media' => $media
        ]);
    }
}
