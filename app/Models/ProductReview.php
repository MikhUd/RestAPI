<?php

namespace App\Models;

use App\Events\ProductReviewCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductReview extends Model
{
    use HasFactory;
    
    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Атрибуты, для которых запрещено массовое заполнение.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Привязанные эвенты.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ProductReviewCreated::class,
    ];
    
    /**
     * Получение продукта по отзыву.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Получение пользователя по отзыву.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
