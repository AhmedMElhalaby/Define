<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        $name = Functions::Translation($this->getId(), 'name', 'City');

        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = $name ? $name->Translate : $this->getName();
        return $Objects;
    }
}
