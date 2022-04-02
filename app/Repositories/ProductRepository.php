<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryContract
{
    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Получение продукта и его рейтинга по ID.
     *
     * @return Product
     */
    public function getProductWithRating(string $id): ?Product
    {
        if ($product = Product::find($id)) {
            $product->getAverageRatingAttribute();
        }
        
        return $product;
    }

    /**
     * Получение всех продуктов с append.
     *
     * @return Collection
     */
    public function getAllProductsWithAppend(string $append): Collection
    {
        return Product::get()->each->append($append);       
    }

    /**
     * Получение списка продуктов имеющих отзыв текущего пользователя.
     *
     * @return Collection
     */
    public function getProductListHavingUserReview(string $userId): Collection
    {
        return $this->model->query()
            ->whereIn('id', function($query) use($userId) {
                $query->select('product_id')
                ->from('product_reviews')
                ->where('user_id', (int)$userId)
                ->get();
            })
            ->get();
    }
}
