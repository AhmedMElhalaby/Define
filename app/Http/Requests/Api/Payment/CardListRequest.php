<?php

namespace App\Http\Requests\Api\Payment;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Http\JsonResponse;

class CardListRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        if (auth('api')->user()->hasStripeId()) {
            $cards = auth('api')->user()->defaultCard();
            return $this->successJsonResponse([],[$cards]);
        } else{
            return $this->errorJsonResponse(__('messages.object_not_found'));
        }
    }
}
