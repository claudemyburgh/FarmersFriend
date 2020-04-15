<?php

namespace App\Observers;

use App\Listing;
use Illuminate\Support\Str;

class ListingObserver
{


    /**
     * @param Listing $listing
     */
    public function creating(Listing $listing)
    {
        $listing->key = Str::uuid();
    }

}
