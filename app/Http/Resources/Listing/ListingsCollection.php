<?php

namespace App\Http\Resources\Listing;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ListingsCollection extends ResourceCollection
{

    public $collects = ListingResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
