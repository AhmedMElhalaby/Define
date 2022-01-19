<?php

namespace App\Http\Requests\Api\Payment;

use App\Http\Requests\Api\ApiRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class AddPaymentRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
        ];
    }
    public function run(): JsonResponse
    {
        $user = auth('api')->user();
        if ($user->hasStripeId()) {
            return $this->failJsonResponse([__('messages.object_exists')]);
        } else {
            try{
                $new =$user->createAsStripeCustomer(['name'=>auth('api')->user()->name,'email'=>auth('api')->user()->email,'phone'=>auth('api')->user()->mobile]);
                $user->updateCard($this->stripeToken);
                return $this->successJsonResponse([],[$new]);
            }catch (Exception $e){
                $user->stripe_id = null;
                $user->save();
                return $this->errorJsonResponse([$e->getMessage()]);
            }
        }
    }
}
