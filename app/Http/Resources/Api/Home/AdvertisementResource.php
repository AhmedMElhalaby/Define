<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    public function toArray($request): array
    {
        $title = Functions::Translation($this->getId(), 'title', 'Advertisement');

        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['title'] = $title ? $title->Translate : $this->getTitle();
        $Objects['image'] = asset($this->getImage());
        return $Objects;
    }
}
