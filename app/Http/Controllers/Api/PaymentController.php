<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Payment\AddPaymentRequest;
use App\Http\Requests\Api\Payment\CardListRequest;
use App\Http\Requests\Api\Payment\HasPaymentRequest;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function add_payment(AddPaymentRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function cards_list(CardListRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function has_payment(HasPaymentRequest $request): JsonResponse
    {
        return $request->run();
    }
}
