<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CreateProductReviewRequest;
use App\Http\Requests\DeleteProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\ProductReview;
use Illuminate\Http\JsonResponse;

interface ProductReviewServiceContract
{
    public function store(CreateProductReviewRequest $request): JsonResponse;

    public function update(ProductReview $productReview, UpdateProductReviewRequest $request): JsonResponse;

    public function destroy(ProductReview $productReview): JsonResponse;
}
