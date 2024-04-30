<?php

namespace App\Services;

use App\Services\CRUD\UserServiceCRUD;

class UserService
{

    public function __construct(
        private readonly UserServiceCRUD $userServiceCRUD
    )
    {
    }

    public function create(array $properties)
    {
        return $this->userServiceCRUD->create($properties);
    }

    public function createToken($user)
    {
        return $user->createToken($user->name)->plainTextToken;
    }

}