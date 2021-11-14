<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transaction\CheckPaymentRequest;
use App\Http\Requests\Api\Transaction\GenerateCheckoutRequest;
use App\Http\Requests\Api\Transaction\IndexRequest;
use App\Http\Requests\Api\Transaction\MyBalanceRequest;
use App\Http\Requests\Api\Transaction\RequestRefundRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function my_balance(MyBalanceRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function generate_checkout(GenerateCheckoutRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function check_payment(CheckPaymentRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function request_refund(RequestRefundRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function add_payment(Request $request){
        $user = auth('api')->user();
        if ($user->hasStripeId()) {
            return $this->errorJsonResponse(__('messages.payment.has_payment'));
        } else {
            try{
                $new =$user->createAsStripeCustomer($request->input('stripeToken'),['email'=>auth('api')->user()->email]);
                $card =$user->updateCard($request->input('stripeToken'));
            }catch (Exception $e){
                $user->stripe_id = null;
                $user->save();
                return $this->errorJsonResponse($e->getMessage(),400,null,[$new]);
            }
            return $this->successJsonResponse([$new],'');
        }
    }
    public function all_cards(Request $request){
        if (auth('api')->user()->hasStripeId()) {
            $cards = auth('api')->user()->defaultCard();
            return $this->successJsonResponse([$cards],'');
        } else{
            return $this->errorJsonResponse(__('messages.payment.has_not_payment'),400,null,[]);
        }
    }
    public function has_payment(){
        if (auth('api')->user()->hasStripeId()) {
            return $this->successJsonResponse([],__('messages.payment.has_payment'));
        }else{
            return $this->failJsonResponse([],__('messages.payment.has_not_payment'));
        }
    }
}
