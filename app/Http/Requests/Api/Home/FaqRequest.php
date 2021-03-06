<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\FaqResource;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        $Faqs = FaqResource::collection(Faq::paginate($this->filled('per_page')?$this->per_page:10));
        return $this->successJsonResponse([],$Faqs->items(),'Faqs',$Faqs);
    }
}
