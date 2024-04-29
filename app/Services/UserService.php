<?php

namespace App\Services;

use App\Services\Common\ServiceResult;
use App\Services\CRUD\UserServiceCRUD;

class UserService
{

    public function __construct
    (
        private readonly UserServiceCRUD $userServiceCRUD,
        private readonly AuthService $authService
    )
    {
    }

    public function create($properties)
    {
        return $this->userServiceCRUD->create($properties);
    }

    public function login($properties)
    {
        return $this->authService->login($properties);
    }

}