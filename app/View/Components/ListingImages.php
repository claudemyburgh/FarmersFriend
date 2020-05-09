<?php

namespace App\View\Components;


use Illuminate\View\Component;

class ListingImages extends Component
{
    /**
     * @var Media
     */
    public $media;
    public $count;

    /**
     * Create a new component instance.
     *
     * @param $media
     */
    public function __construct($media)
    {
        $this->media = $media->images();
        $this->count = $this->media->count();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.listing-images');
    }
}
