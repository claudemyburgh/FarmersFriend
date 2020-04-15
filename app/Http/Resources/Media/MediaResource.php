<?php

namespace App\Http\Resources\Media;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Conversions\ConversionCollection;

class MediaResource extends JsonResource
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
            'id' => $this->resource->id,
            'file_name' => $this->resource->file_name,
            'mime_type' => $this->resource->mime_type,
            'size' => $this->resource->size,
            'href' => $this->resource->href,
            'type' => $this->getVersions(),
        ];
    }

    /**
     *
     */
    protected function getVersions()
    {
        $conversions = ConversionCollection::createForMedia($this->resource);

        $versions = $conversions->reduce(function ($carry, Conversion $conversion) {
           if ($conversion->shouldBePerformedOn($this->resource->collection_name)) {
               $name = $conversion->getName();
               $carry[$name] = $this->resource->getFullUrl($name);
           }
           return $carry;
        }, []);

        return array_merge($versions, [
            'original' => $this->resource->getFullUrl()
        ]);

    }

}
