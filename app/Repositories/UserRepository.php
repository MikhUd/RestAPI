<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Создание пользователя.
     *
     * @return User
     */
    public function create(array $fields): User
    {
        return $this->model->create($fields);
    }
}
