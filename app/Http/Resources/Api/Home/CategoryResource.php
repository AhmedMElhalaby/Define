<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $name = Functions::Translation($this->getId(), 'name', 'Category');
        $description = Functions::Translation($this->getId(), 'description', 'Category');

        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = ($name ? $name->Translate : $this->getName());
        $Objects['description'] = ($description ? $description->Translate : $this->getDescription());
        $Objects['image'] = asset($this->getImage());
                $Objects['color'] = $this->getColor() ;
        $Objects['parent_id'] = $this->getParentId();
        return $Objects;
    }
}
