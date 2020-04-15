<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactListingUser extends Component
{
    public $listing;

    /**
     * Create a new component instance.
     *
     * @param $listing
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
        return view('components.contact-listing-user');
    }
}
