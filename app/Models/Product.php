<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $appends = ['averageRating'];

    public function getAverageRatingAttribute()
    {
        return $this->query()
            ->selectRaw('avg(p_r.rating) as rating')
            ->from('product_reviews as p_r')
            ->where('p_r.product_id', $this->id)
            ->first()->rating;
    }
}
