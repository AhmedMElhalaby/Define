<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        $name = Functions::Translation($this->getId(), 'name', 'Country');

        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = $name ? $name->Translate : $this->getName();
        $Objects['country_code'] = $this->getCountryCode();
        $Objects['flag'] = asset($this->getFlag());
        $Objects['Cities'] = CityResource::collection($this->cities);
        return $Objects;
    }
}
