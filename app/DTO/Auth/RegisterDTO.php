<?php

namespace App\DTO\Auth;

use App\DTO\Common\BaseDTO;

class RegisterDTO extends BaseDTO
{

    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $password
    )
    {
    }

}