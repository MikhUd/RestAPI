<?php

namespace App\Services;

use App\Http\Requests\CreateProductReviewRequest;
use App\Http\Requests\DeleteProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\ProductReview;
use App\Repositories\Interfaces\ProductRepositoryContract;
use App\Repositories\Interfaces\ProductReviewRepositoryContract;
use App\Services\Interfaces\ProductReviewServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductReviewService implements ProductReviewServiceContract
{

    public function __construct(
        private ProductReviewRepositoryContract $productReviewRepository,
    ) {}

    /**
     * Создание отзыва о продукте.
     *
     * @return JsonResponse
     */
    public function store(CreateProductReviewRequest $request): JsonResponse
    {
        $attributes = $request->toArray();
        $attributes['user_id'] = $request->user()->id;
        
        DB::beginTransaction();
        try {
            $productReview = $this->productReviewRepository->store($attributes);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => "Exception while creating product review",
                'exception' => $e,
            ], 403);
        }

        return response()->json([
            'success' => true,
            'productReview' => $productReview->withoutRelations(),
            'message' => 'Product review successfully created',
        ], 201);
    }

    /**
     * Редактирование отзыва о продукте.
     *
     * @return JsonResponse
     */
    public function update(ProductReview $productReview, UpdateProductReviewRequest $request): JsonResponse
    {
        $attributes = $request->toArray();

        DB::beginTransaction();
        try {
            $productReview = $this->productReviewRepository->update($productReview, $attributes);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return response()->json([
            'success' => true,
            'productReview' => $productReview->withoutRelations(),
            'message' => 'Product review successfully updated',
        ], 201);
    }

    /**
     * Удаление отзыва о продукте.
     *
     * @return JsonResponse
     */
    public function destroy(ProductReview $productReview): JsonResponse
    {
        $this->productReviewRepository->destroy($productReview);

        return response()->json([
            'success' => true,
            'message' => 'Product review successfully deleted',
        ], 201);
    }
}
