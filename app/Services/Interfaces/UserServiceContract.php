<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface UserServiceContract
{
    public function create(array $fields): ?User;
}
