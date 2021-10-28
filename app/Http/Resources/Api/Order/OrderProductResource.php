<?php

namespace App\Http\Resources\Api\Order;

use App\Helpers\Functions;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\MediaResource;
use App\Models\Favourite;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ProductDeliveryShopping;

class OrderProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $name = Functions::Translation($this->getProductId(), 'name', 'Product');
        $description = Functions::Translation($this->getProductId(), 'description', 'Product');


        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['product_id'] = $this->getProductId();
        $Objects['category_id'] = $this->Product->getCategoryId();
        $Objects['Category'] = new CategoryResource($this->Product->category);
        $Objects['name'] = $name ? $name->Translate : $this->getName();
        $Objects['description'] = $description ? $description->Translate : $this->getDescription();
        $Objects['price'] = $this->getPrice();
        $Objects['color'] = $this->getColor();
                $Objects['count'] =  $this->getCount();
        $Objects['DeliveryShopping'] = ProductDeliveryShopping::find($this->delivery_shopping_id);

        $Objects['logo'] = $this->geLogo();
        $Objects['rate'] = $this->Product->reviews()->avg('rate')??5;
        $Objects['is_fav'] = auth('api')->check() && (bool)Favourite::where('product_id', $this->Product->getId())->where('user_id', auth('api')->user()->getId())->first();
        $Objects['Media'] = MediaResource::collection($this->Product->media);
        return $Objects;
    }
}
