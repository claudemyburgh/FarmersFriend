<?php

namespace App\View\Components;

use http\Env\Request;
use Illuminate\View\Component;

class ListingUserProfile extends Component
{
    /**
     * @var Listing
     */
    public $listing;

    /**
     * Create a new component instance.
     *
     * @param Listing $listing
     */
    public function __construct($listing)
    {
        //
        $this->listing = $listing;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.listing-user-profile');
    }



}
