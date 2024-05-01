<?php

namespace App\Http\Controllers\Api\V1;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(
        private readonly AuthService $authService
    )
    {

    }

    public function register(Request $request)
    {
        $result = $this->authService->register(registerDTO: RegisterDTO::fillAttributes($request->all()));

        if ($result->isError){
            return response()->json([
                $result->message,
                $result->errors
            ]);
        }

        return new AuthResource($result->data);
    }

    public function login(Request $request)
    {
        $result = $this->authService->login(loginDTO: LoginDTO::fillAttributes($request->all()));

        if ($result->isError){
            return response()->json([
                $result->message,
                $result->errors
            ]);
        }

        return new AuthResource($result->data);
    }



}
