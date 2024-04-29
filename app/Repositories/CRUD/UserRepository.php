<?php

namespace App\Repositories\CRUD;

use App\Models\User;
use App\Repositories\CRUD\Common\BaseCRUDRepository;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends Common\BaseCRUDRepository
{
    public function getModelsQB(): Builder
    {
        return User::query();
    }
}