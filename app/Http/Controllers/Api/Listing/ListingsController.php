<?php

namespace App\Http\Controllers\Api\Listing;



use App\Area;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ListingCreateRequest;
use App\Http\Resources\Listing\ListingsCollection;
use App\Listing;
use Illuminate\Http\Request;


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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ListingCreateRequest $request)
    {
        Listing::create(array_merge($request->only(['title', 'body', 'category_id', 'area_id', 'url', 'price']),
            ['user_id' => $request->user()->id]
        ));

        return response()->json([
            'success' => true
        ]);

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
