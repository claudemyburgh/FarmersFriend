<?php

namespace App\Http\Controllers\Listing;


use App\Area;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFormRequest;
use App\Http\Resources\Listing\ListingResource;
use App\Jobs\UserViewedListing;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    /**
     * @param Area $area
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Area $area, Category $category)
    {
        return view('listings.index', compact( 'category'));
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Area $area, Listing $listing)
    {

        if (!$listing->isLive()) {
            abort(404);
        }

        $listing->load('user', 'media');

        if ($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing));
        }


        return view('listings.show', compact('listing'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('listings.create');
    }


    /**
     * @param StoreListingFormRequest $request
     * @param Area $area
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreListingFormRequest $request, Area $area)
    {
        $this->authorize('edit', $listing);

        $listing = Listing::create(array_merge($request->only('title', 'body', 'category_id', 'area_id'),
            [
                'user_id' => $request->user()->id
            ]
        ));

        return redirect()->route('listings.edit', [$area, $listing])->withSuccess('Successfully created, But not yet live');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return ListingResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('edit', $listing);

       $listing->load('media', 'area', 'category');

        return view('listings.edit', compact('listing'))->withSuccess('Listing successfully created.');
    }

    /**
     * @param StoreListingFormRequest $request
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ListingCreateRequest $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;

        if (!$listing->isLive()) {
            $listing->parent_id = $request->parent_id;
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;

        $listing->save();

        if ($request->has('payment')) {
            return redirect()->route('listings.payment.show', [$area, $listing]);
        }

        return back()->withSuccess('Listing edited successfully.');
    }

    /**
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Area $area, Listing $listing)
    {
        $this->authorize('destroy', $listing);

        $listing->delete();

        return redirect()->back()->withSuccess('Listing was deleted.');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function upload(Request $request, Area $area, Listing $listing)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('file') && $request->file('file')->isValid()){
            $listing->addMediaFromRequest('file')->toMediaCollection('listing');
        }

        return redirect()->back()->withSuccess('Image added successfully!');
    }

}
