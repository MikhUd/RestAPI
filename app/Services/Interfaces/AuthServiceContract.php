<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    public function getToken(UserLoginRequest $request): JsonResponse;

    public function register(UserRegisterRequest $request): JsonResponse;
}
