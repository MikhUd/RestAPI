<?php

namespace App\Repositories;

use App\Models\ProductReview;
use App\Repositories\Interfaces\ProductReviewRepositoryContract;

class ProductReviewRepository implements ProductReviewRepositoryContract
{
    private $model;

    public function __construct(ProductReview $productReview)
    {
        $this->model = $productReview;
    }

    /**
     * Создание отзыва.
     *
     * @return ProductReview
     */
    public function store(array $attributes): ?ProductReview
    {
        return $this->model->create($attributes);
    }

    /**
     * Обновление отзыва.
     *
     * @return ProductReview
     */
    public function update(ProductReview $productReview, array $attributes): ?ProductReview
    {
        $productReview->update($attributes);

        return $productReview;
    }

    /**
     * Удаление отзыва.
     *
     * @return ProductReview
     */
    public function destroy(ProductReview $productReview): bool
    {
        return $productReview->delete();
    }

    /**
     * Удаление всех отзывов у продукта с id.
     *
     * @return ProductReview
     */
    public function removeReviewsByProduct(string $productId): bool
    {
        return $this->model->query()
            ->where('product_id', $productId)
            ->delete();
    }
}
