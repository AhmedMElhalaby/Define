<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\AdvertisementResource;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\LanguageResource;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Country;
use App\Models\Language;
use App\Models\OrderProduct;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;

class InstallRequest extends ApiRequest
{
    public function run(): JsonResponse
    {

        $data = [];
        $data['Settings'] = Setting::pluck((app()->getLocale() == 'en') ? 'value' : 'value', 'key')->toArray();
        $data['Countries'] = CountryResource::collection(Country::where('is_active', true)->get());
        $data['Categories'] = CategoryResource::collection(Category::where('is_active', true)->get());
        $data['Advertisements'] = AdvertisementResource::collection(Advertisement::where('is_active', true)->get());
        $data['Languages'] = LanguageResource::collection(Language::all());

        $OrderProduct = OrderProduct::select('product_id')
            ->selectRaw('COUNT(product_id) AS count')
            ->groupBy('product_id')
            ->orderByDesc('count')
//            ->limit(5)
            ->get();
//        $data['ProductsMostOrder'] = $OrderProduct->pluck('Product');
        $data['ProductsMostOrder'] = $OrderProduct->load('Product');
        $data['Essentials'] = [
            'TicketsStatus' => Constant::TICKETS_STATUS,
            'NotificationType' => Constant::NOTIFICATION_TYPE,
            'VerificationType' => Constant::VERIFICATION_TYPE,
            'UserTypes' => Constant::USER_TYPE,
            'OrderStatuses' => Constant::ORDER_STATUSES,
        ];
        return $this->successJsonResponse([], $data);
    }
}
