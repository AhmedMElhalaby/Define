<?php

namespace App\Http\Requests\Api\Order;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;

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
            'order_date'=>'required|date',
            'order_time'=>'required',
            'products'=>'required|array',
            'products.*.product_id'=>'required|exists:products,id',
            'products.*.quantity'=>'required|numeric',
            // 'products.*.color'=>'required',
            'products.*.logo'=>'required|numeric',
            'address'=>'required|string',
            'note'=>'sometimes|string',
            'products.*.count'=>'required'

        ];
    }

    public function run(): JsonResponse
    {
        $Object = new Order();
        $Object->setUserId(auth()->user()->getId());
        $Object->setOrderDate($this->order_date);
        $Object->setOrderTime($this->order_time);
        $Object->setAddress($this->address);
        $Object->setStatus(Constant::ORDER_STATUSES['New']);
        $Object->setNote(@$this->note);
        $Object->setLat(@$this->lat);
        $Object->setLng(@$this->lng);
        $Object->setAmount(0);
        $Object->save();
        $Object->refresh();
        $Amount = 0;
        foreach ($this->products as $product){
            $Product = (new Product())->find($product['product_id']);
//            dd($Product['quantity']);
            $OrderProduct = new OrderProduct();
            $OrderProduct->setOrderId($Object->getId());
            $OrderProduct->setProductId($Product->getId());
            $OrderProduct->setName($Product->getName());
            $OrderProduct->setCount($product['count']);

            $OrderProduct->setDescription($Product->getDescription());
                        $OrderProduct->setDeliveryShopping($product['delivery_shopping_id']);

//            $OrderProduct->setNameAr($Product->getNameAr());
//            $OrderProduct->setDescriptionAr($Product->getDescriptionAr());
            $OrderProduct->setPrice($Product->getPrice());
            $OrderProduct->setQuantity($product['quantity']);
            $OrderProduct->setColor($product['color']);
            $OrderProduct->setLogo($product['logo']);
            $OrderProduct->save();
            $Amount += ($Product->getPrice() * $product['quantity']);
        }
        $Object->setAmount($Amount);
        $Object->save();
        $user = User::find(auth()->user()->getId());
        $user->setPoints($user->points + 1) ;
        $user->save();
        Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['New']);
        return $this->successJsonResponse([__('messages.created_successful')],new OrderResource($Object),'Order');

    }
}
