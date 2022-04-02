<?php

namespace App\Repositories\Interfaces;

use App\Models\ProductReview;

interface ProductReviewRepositoryContract
{
    public function store(array $attributes): ?ProductReview;

    public function update(ProductReview $productReview, array $attributes): ?ProductReview;

    public function destroy(ProductReview $productReview): bool;

    public function removeReviewsByProduct(string $productId): bool;
}
