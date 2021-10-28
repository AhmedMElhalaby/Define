<?php

namespace App\Http\Requests\Api\Location;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\UserResource;
use App\Http\Resources\Api\Location\LocationResource;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Order;
use App\Models\UserLocation;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed location_id
 */

class ShowRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'location_id'=>'required|exists:user_locations,id',
        ];
    }
   public function run(): JsonResponse
   {

       return $this->successJsonResponse([], new LocationResource((new UserLocation())->find($this->location_id)), 'location');
   }
}
