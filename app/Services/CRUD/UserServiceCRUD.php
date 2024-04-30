<?php

namespace App\Services\CRUD;

use App\Models\User;
use App\Repositories\CRUD\UserRepositoryCRUD;
use Illuminate\Database\Eloquent\Model;

class UserServiceCRUD extends Common\BaseCRUDService
{

    public function __construct(UserRepositoryCRUD $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @inheritDoc
     */
    public function getModelInstance(): Model
    {
        return new User();
    }

    /**
     * @inheritDoc
     */
    public function getValidateModelRules(array $properties): array
    {
        return [
            'name'=>'required|string',
            'email'=>'unique:users,email|required|email',
            'password'=> 'required',
        ];
    }
}