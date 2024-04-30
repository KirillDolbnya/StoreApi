<?php

namespace App\Services;

use App\Services\Common\ServiceResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService
{

    public function __construct
    (
        private readonly UserService $userService
    )
    {
    }

    public function register(array $properties): ServiceResult
    {

        $result = $this->userService->create($properties);

        if ($result->isError){
            return ServiceResult::createErrorResult(
                'Введены не валидные данные',
                $result->errors
            );
        }

        $user = $result->data;
        $token = $this->userService->createToken($user);

        return ServiceResult::createSuccessResult([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login($credentials)
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
        $token = $this->userService->createToken($user);

        return ServiceResult::createSuccessResult([
            'user' => $user,
            'token' => $token
        ]);
    }
}