<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed email
 */
class ForgetPasswordRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }
    public function run(): JsonResponse
    {
        $user = User::where('email',$this->email)->first();
        if($user){
            Functions::SendForget($user);
            return $this->successJsonResponse([__('auth.code_sent')] );
        }
        return $this->failJsonResponse([__('messages.object_not_found')]);
    }
}
