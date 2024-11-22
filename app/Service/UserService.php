<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\User;

class UserService
{
    public function __construct(private User $userModel) {
    }

    public function login(): string
    {
        if ($token = auth()->attempt($credentials)) {

        }
    }
}