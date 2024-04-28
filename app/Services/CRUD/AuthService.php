<?php

namespace App\Services\CRUD;

use App\Models\User;
use App\Repositories\CRUD\AuthRepository;
use App\Services\Common\ServiceResult;
use Illuminate\Database\Eloquent\Model;

class AuthService extends Common\BaseCRUDService
{

    public function __construct(AuthRepository $repository)
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

    public function create(array $properties): ServiceResult
    {
        $model = $this->getModelInstance();

        $result = $this->validateProperties($properties);


        if ($result->fails()){
            return ServiceResult::createErrorResult(
                'Переданы не валидные данные',
                $result->errors()->messages()
            );
        }



        $user = $model->create($properties);

        return ServiceResult::createSuccessResult($user);
    }
}