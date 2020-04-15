<?php

namespace App\Http\Resources\Listing;

use App\Http\Resources\Area\AreaResource;
use App\Http\Resources\Media\MediaResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'key' => $this->key,
            'body' => $this->body,
            'live' => $this->live,
            'url' => $this->url,
            'price' => $this->price,
            'created_at' => $this->created_at->timestamp,
            'updated_at' => $this->updated_at->timestamp,
            'user' => new UserResource($this->user),
            'area' => new AreaResource($this->area),
            'images' => MediaResource::collection($this->media)
        ];
    }
}
