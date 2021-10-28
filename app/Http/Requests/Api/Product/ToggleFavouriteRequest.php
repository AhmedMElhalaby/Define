<?php

namespace App\Http\Requests\Api\Product;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Food\FoodResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Favourite;
use App\Models\Food;
use App\Models\Media;
use App\Models\Product;
use App\Models\Review;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 */
class ToggleFavouriteRequest extends ApiRequest
{
    use ResponseTrait;

    public function rules():array
    {
        return [
            'product_id'=>'required|exists:products,id',
        ];
    }

    public function persist(): JsonResponse
    {
        $Product = (new Product())->find($this->product_id);
        $logged = auth()->user();
        $Object = (new Favourite())->where('product_id',$Product->getId())->where('user_id',$logged->getId())->first();
        if (!$Object){
            $Object = new Favourite();
            $Object->setProductId($Product->getId());
            $Object->setUserId($logged->getId());
            $Object->save();
        }else{
            $Object->delete();
        }
        return $this->successJsonResponse([__('messages.updated_successful')],new ProductResource($Product),'Product');
    }
}
