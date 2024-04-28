<?php

namespace App\Repositories\CRUD;

use App\Models\User;
use App\Repositories\CRUD\Common\BaseCRUDRepository;
use Illuminate\Database\Eloquent\Builder;

class AuthRepository extends Common\BaseCRUDRepository
{

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getModelsQB(): Builder
    {
        return $this->user->query();
    }
}