<?php

namespace App\Http\Requests\Api\Payment;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Http\JsonResponse;

class HasPaymentRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        if (auth('api')->user()->hasStripeId()) {
            return $this->successJsonResponse([__('messages.object_exists')]);
        }else{
            return $this->failJsonResponse([__('messages.object_not_found')]);
        }
    }
}
