<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryContract
{
    public function getProductWithRating(string $id): ?Product;

    public function getAllProductsWithAppend(string $append): Collection;

    public function getProductListHavingUserReview(string $userId): Collection;
}
