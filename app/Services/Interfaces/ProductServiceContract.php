<?php

namespace App\Services\Interfaces;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ProductServiceContract
{
    public function getProductWithRating(Request $request): JsonResponse;

    public function getProductListByFilter(Request $request): JsonResponse;

    public function getProductListHavingUserReview(Request $request): JsonResponse;
}
