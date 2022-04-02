<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryContract;
use App\Services\Interfaces\UserServiceContract;

class UserService implements UserServiceContract
{

    public function __construct(
        private UserRepositoryContract $userRepository,
    ) {}

    /**
     * Создание пользователя.
     *
     * @return User
     */
    public function create(array $fields): ?User
    {
        if ($user = $this->userRepository->create($fields)) {
            return $user;
        }

        return null;
    }
}
