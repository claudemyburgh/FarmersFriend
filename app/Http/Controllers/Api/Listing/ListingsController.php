<?php

namespace App\Http\Controllers\Api\Listing;



use App\Area;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ListingCreateRequest;
use App\Http\Resources\Listing\ListingResource;
use App\Http\Resources\Listing\ListingsCollection;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ListingsController extends Controller
{

    /**
     * @param Area $area
     * @param Category $category
     * @return ListingsCollection
     */
    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])->inArea($area)->isLive()->fromCategory($category)->latestFirst()->paginate(12);
        return new ListingsCollection($listings);
    }


    /**
     * @param ListingCreateRequest $request
     * @param Listing $listing
     * @return ListingResource
     */
    public function store(ListingCreateRequest $request, Listing $listing)
    {
        $listing = $listing::create(array_merge($request->only(['title', 'body', 'category_id', 'area_id', 'url', 'price']),
            [
                'area_parent_id' => $request->province_id,
                'user_id' => $request->user()->id,
                'key' => (string) Str::uuid()
            ]
        ));

        return new ListingResource($listing);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ListingResource
     */
    public function show($key)
    {

        $listing = Listing::find($key);

//        $listing->load('area', 'user', 'media');

        return new ListingResource($listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ListingCreateRequest $request
     * @param Listing $listing
     * @return ListingResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ListingCreateRequest $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        if (!$listing->isLive()) {
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;

        $listing = $listing->update(array_merge($request->only(['title', 'body', 'category_id', 'area_id', 'url', 'price']), [
            'area_parent_id' => $request->province_id,

        ]));

        if ($request->has('payment')) {
            return redirect()->route('listings.payment.show', [$area, $listing]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
