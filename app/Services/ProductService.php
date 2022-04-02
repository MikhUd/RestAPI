<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryContract;
use App\Services\Interfaces\ProductServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductService implements ProductServiceContract
{

    public function __construct(
        private ProductRepositoryContract $productRepository,
    ) {}

    /**
     * Получение продукта и его рейтинга по ID.
     *
     * @return JsonResponse
     */
    public function getProductWithRating(Request $request): JsonResponse
    {
        if ($product = $this->productRepository->getProductWithRating($request->id)) {
            return response()->json([
                'success' => true,
                'product' => $product,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found',
        ]);
    }

    /**
     * Получение списка продуктов по минимальному рейтингу.
     *
     * @return JsonResponse
     */
    public function getProductListByFilter(Request $request): JsonResponse
    {
        $minRating = $request->min_rating;
        $orderBy = $request->order_by;

        $products = $this->productRepository
        ->getAllProductsWithAppend('averageRating')
        ->filter(function($product) use($minRating) {
            return $product->averageRating > $minRating;
        })
        ->sortBy([function($a, $b) use($orderBy) {
            if ($orderBy == 'asc') {
                return $a->averageRating <=> $b->averageRating;
            }

            return $a->averageRating <= $b->averageRating;
        }]);
        
        return response()->json([
            'success' => true,
            'products' => $products->toArray(),
        ]);
    }


    /**
     * Получение списка продуктов имеющих отзыв текущего пользователя.
     *
     * @return JsonResponse
     */
    public function getProductListHavingUserReview(Request $request): JsonResponse
    {
        $products = $this->productRepository->getProductListHavingUserReview($request->user()->id);

        return response()->json([
            'success' => true,
            'products' => $products->toArray(),
        ]);
    }
}
