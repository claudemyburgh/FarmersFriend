<?php

namespace App\View\Components\Listing;


use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class UploadImage extends Component
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
    public function __construct(Model $listing)
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
        return view('components.listing\-upload-image');
    }
}
