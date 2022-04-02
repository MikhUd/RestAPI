<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductReviewRequest;
use App\Http\Requests\DeleteProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\ProductReview;
use App\Services\Interfaces\ProductReviewServiceContract;

class ProductReviewController extends Controller
{
    public function __construct(
        private ProductReviewServiceContract $productReviewService,
    ) {}

    public function store(CreateProductReviewRequest $request)
    {
        return $this->productReviewService->store($request);
    }

    public function update(ProductReview $productReview, UpdateProductReviewRequest $request)
    {
        return $this->productReviewService->update($productReview, $request);
    }

    public function destroy(ProductReview $productReview, DeleteProductReviewRequest $request)
    {
        return $this->productReviewService->destroy($productReview);
    }
}
