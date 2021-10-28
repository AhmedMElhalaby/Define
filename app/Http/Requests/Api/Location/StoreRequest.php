<?php

namespace App\Http\Requests\Api\Location;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Location\LocationResource;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UserLocation;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 * @property mixed quantity
 * @property mixed note
 * @property mixed delivered_date
 * @property mixed delivered_time
 */
class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'lat'=>'required',
            'lng'=>'required',
            'address'=>'required',
        ];
    }

    public function run(): JsonResponse
    {
        $Object = new UserLocation();
        $Object->setUserId(auth()->user()->getId());
        $Object->setLat(@$this->lat);
        $Object->setLng(@$this->lng);
        $Object->setAddress(@$this->address);
        $Object->save();
        $Object->refresh();
        return $this->successJsonResponse([__('messages.created_successful')],new LocationResource($Object),'Location');

    }
}
