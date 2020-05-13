<?php

namespace App\Http\Controllers\Listing;


use App\Area;
use App\Events\ListingPaymetCompleted;
use App\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPaymentController extends Controller
{
    /**
     * ListingPaymentController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Area $area, Listing $listing)
    {
        $this->authorize('touch', $listing);

        if ($listing->isLive()) {
            return back();
        }

        return view('listings.payment.show', compact('listing'));
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('touch', $listing);

//        event(new ListingPaymetCompleted($listing));

        if ($listing->isLive()) {
            return back();
        }

        if ($listing->cost() === 0) {
            return back();
        }

//        if (($nonce = $request->payment_method_nonce) === null) {
//            return back();
//        }
//
//        $result = \Braintree_Transaction::sale([
//            'amount' => $listing->cost(),
//            'paymentMethodNonce' => $nonce,
//            'options' => [
//                'submitForSettlement' => true
//            ]
//        ]);
//
//        if ($result->success === false) {
//            return back()->withError('Something went wrong while processing your payment.');
//        }

        $listing->live = Carbon::now();
        $listing->created_at = Carbon::now();
        $listing->save();

        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations! Payment accepted and your listing is live.');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('touch', $listing);

//        event(new ListingPaymetCompleted($listing));


        if ($listing->cost() > 0) {
            return back();
        }

        $listing->live = Carbon::now();
        $listing->created_at = Carbon::now();
        $listing->expire_at =  Carbon::now()->addWeek(2);
        $listing->save();

        return redirect()
            ->route('listings.edit', [$area, $listing])
            ->withSuccess('Congratulations! Your listing is live.');
    }
}
