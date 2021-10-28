<?php

namespace App\Http\Requests\Api\Product;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Food\FoodResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Food;
use App\Models\Media;
use App\Models\Product;
use App\Models\Review;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 * @property mixed rate
 * @property mixed review
 */
class ReviewRequest extends ApiRequest
{
    use ResponseTrait;

    public function rules():array
    {
        return [
            'product_id'=>'required|exists:products,id',
            'rate'=>'required|numeric',
            'review'=>'string'
        ];
    }

    public function persist(): JsonResponse
    {
        $Product = (new Product)->find($this->product_id);
        $Object = new Review();
        $Object->setProductId($Product->getId());
        $Object->setRate($this->rate);
        $Object->setReview($this->review);
        $Object->save();
        $Product->refresh();
        return $this->successJsonResponse([__('messages.updated_successful')],new ProductResource($Product),'Product');
    }
}
