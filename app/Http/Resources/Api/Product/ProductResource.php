<?php

namespace App\Http\Resources\Api\Product;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\MediaResource;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $name =  Functions::Translation($this->getId(),'name','Product');
        $description =  Functions::Translation($this->getId(),'description','Product');
        $country_coin = ( Auth::guard('api')->check() ?   User::find(auth('api')->user()->getId())->country->coin : '');
        $price = $this->getPrice() * ( $country_coin ? $country_coin->price : 1);
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['category_id'] = $this->getCategoryId();
        $Objects['color'] = $this->Colors;
        $Objects['quantity'] = $this->Quantities;
                $Objects['ProductDeliveryShopping'] = $this->ProductDeliveryShopping;

        $Objects['Category'] = new CategoryResource($this->category);
        $Objects['name'] =  ($name  ? $name->Translate: $this->getName());
        $Objects['description'] = ( $description ? $description->Translation: $this->getDescription());
        $Objects['price'] = $price;
        $Objects['rate'] = $this->reviews()->avg('rate')??5;
        $Objects['is_fav'] = auth('api')->check() && (bool)Favourite::where('product_id', $this->getId())->where('user_id', auth('api')->user()->getId())->first();
        $Objects['Media'] = MediaResource::collection($this->media);
        return $Objects;
    }
}
