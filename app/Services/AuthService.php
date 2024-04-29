<?php

namespace App\Services;

use App\Services\Common\ServiceResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService
{
    public function login($credentials): ServiceResult
    {
        $valid = Validator::make($credentials,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($valid->fails()){
            return ServiceResult::createErrorResult(
              'Ведены неверные данные',
                $valid->errors()->messages()
            );
        }

        if (!Auth::attempt($credentials)){
            return ServiceResult::createErrorResult('Данные для входна неверны');
        }

        $user = Auth::getUser();
        $token = $user->createToken($user->name)->plainTextToken;

        return ServiceResult::createSuccessResult([
            'user' => $user,
            'token' => $token
        ]);
    }
}