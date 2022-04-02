<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryContract
{
    public function create(array $fields): User;
}
