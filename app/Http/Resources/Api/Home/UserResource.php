<?php

namespace App\Http\Resources\Api\Home;

use App\Models\Category;
use App\Models\FreelancerCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['mobile'] = $this->getMobile();
        $Object['email'] = $this->getEmail();
        $Object['bio'] = $this->getBio();
        $Object['avatar'] = asset($this->getAvatar());
        $Object['lat'] = $this->getLat();
        $Object['lng'] = $this->getLng();
        $Object['address'] = $this->getAddress();
        $Object['City'] = new CityResource($this->city);
        return $Object;
    }

}
