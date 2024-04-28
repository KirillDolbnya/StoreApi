<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Common\ServiceResult;
use App\Services\CRUD\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(Request $request)
    {

       $result = $this->service->create($request->all());

        if ($result->isError) {
            return response()->json([
                'message' => $result->message,
                'errors' => $result->errors
            ]);
        }

        $user = $result->data;
        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=>$token,
        ]);
    }



}
