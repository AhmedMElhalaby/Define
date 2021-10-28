<?php

namespace App\Http\Resources\Api\Location;

use App\Http\Resources\Api\Home\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($Objects):array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['user_id'] = $this->getUserId();
        $Objects['User'] = new UserResource($this->user);
        $Objects['lat'] = $this->getLat();
        $Objects['lng'] = $this->getLng();
        $Objects['address'] = $this->getAddress();
        return $Objects;
    }
}
