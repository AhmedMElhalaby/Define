<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Favourite;
use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed user_id
 * @property mixed category_id
 * @property mixed per_page
 */
class IndexRequest extends ApiRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'category_id'=>'sometimes|exists:categories,id',
            'per_page'=>'sometimes|numeric'
        ];
    }

    public function persist(): JsonResponse
    {
        $Objects = new Product();
//        dd($Objects->Colors);
//        $Objects = $Objects->Colors;
//        $Objects = $Objects->Quantities;
        if($this->filled('category_id')){
            $Objects = $Objects->where('category_id',$this->category_id);
        }
//        if ($this->filled('most_ordered')){
//            $Objects = $Objects->leftJoin('orders_products','products.id','=','orders_products.product_id')
//                ->selectRaw('products.*, count(orders_products.order_id) order_count')
//                ->groupBy('products.id')
//                ->orderBy('order_count','desc');
//
//        }


        if($this->filled('q')){
            $q = $this->q;
            $Objects = $Objects->where(function ($query) use ($q){
                return $query->where('name','Like','%'.$q.'%');
            });
        }



        if($this->filled('favourite') && auth()->check()){
            $FavId = Favourite::where('user_id',auth()->user()->getId())->pluck('food_id');
            $Objects = $Objects->whereIn('id',$FavId);
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        $Objects = ProductResource::collection($Objects);
        return $this->successJsonResponse([],$Objects->items(),'Products',$Objects);
    }
}
