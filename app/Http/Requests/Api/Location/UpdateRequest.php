<?php

namespace App\Http\Requests\Api\Location;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Order;
use App\Helpers\Constant;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed order_id
 * @property mixed status
 * @property mixed reject_reason
 * @property mixed cancel_reason
 */
class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
//        return [
//            'order_id'=>'required|exists:orders,id',
//        ];
    }

    public function run(): JsonResponse
    {
//        $Object = (new Order)->find($this->order_id);
//
//        return $this->successJsonResponse([__('messages.updated_successful')],new OrderResource($Object),'Order');
    }
}
