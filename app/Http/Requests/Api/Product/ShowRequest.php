<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Food\FoodResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Food;
use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 */
class ShowRequest extends ApiRequest
{
    use ResponseTrait;

    public function rules():array
    {
        return [
            'product_id'=>'sometimes|exists:products,id',
        ];
    }

    public function persist(): JsonResponse
    {
        $Object = (new Product())->find($this->product_id);
        $Object = new ProductResource($Object);
        return $this->successJsonResponse([],$Object,'Product');
    }
}
