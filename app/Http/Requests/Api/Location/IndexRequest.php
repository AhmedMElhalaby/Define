<?php

namespace App\Http\Requests\Api\Location;

use App\Http\Resources\Api\Location\LocationResource;
use App\Models\UserLocation;
use Illuminate\Http\JsonResponse;
use App\Models\Order;
use App\Traits\ResponseTrait;
use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Order\OrderResource;

/**
 * @property mixed per_page
 * @property mixed is_completed
 */
class IndexRequest extends ApiRequest
{
    public function run():JsonResponse
    {

        $logged = auth()->user();

        $Objects = new UserLocation();
        if($logged->getType() == Constant::USER_TYPE['Customer']){
            $Objects = $Objects->where('user_id',$logged->getId());
        }else{
            $Objects = $Objects->where('delegate_id',$logged->getId());
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        $Objects = LocationResource::collection($Objects);
        return $this->successJsonResponse([],$Objects->items(),'Location',$Objects);
    }
}
