<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
{
    public function toArray($request): array
    {
        $english_name = Functions::Translation($this->getId(), 'english_name', 'Language');
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['english_name'] = ($english_name ? $english_name->Translate : $this->getEnglishName());
        $Objects['code'] =  $this->getCode();
        return $Objects;
    }
}
