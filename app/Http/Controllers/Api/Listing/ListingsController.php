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
        $listings = Listing::with(['user', 'area'])->inArea($area)->isLive()->fromCategory($category)->latestFirst()->paginate(8);

        return new ListingsCollection($listings);
    }


    /**
     * @param ListingCreateRequest $request
     * @param Listing $listing
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ListingCreateRequest $request, Listing $listing)
    {
        $listing = $listing::create(array_merge($request->only(['title', 'body', 'category_id', 'area_id', 'url', 'price']),
            [
                'user_id' => $request->user()->id,
                'key' => Str::uuid()
            ]
        ))->id;



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
