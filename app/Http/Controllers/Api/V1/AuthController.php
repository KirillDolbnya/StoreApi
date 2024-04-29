<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct
    (
        private readonly UserService $userService
    )
    {

    }

    public function register(Request $request)
    {

       $result = $this->userService->create($request->all());

        if ($result->isError) {
            return response()->json([
                'message' => $result->message,
                'errors' => $result->errors
            ]);
        }

        return UserResource::make($result->data['user']);
    }

    public function login(Request $request)
    {
        $result = $this->userService->login($request->all());

        if ($result->isError){
            return response()->json([
                $result->message,
                $result->errors
            ]);
        }

        return UserResource::make($result->data['user']);
    }



}
