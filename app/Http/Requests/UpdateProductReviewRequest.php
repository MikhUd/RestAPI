<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductReviewRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
       *
    * @return bool
    */
    public function authorize()
    {
        $productReview = $this->route('product_review');

        return $productReview && $this->user()->can('update', $productReview);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'sometimes|required|integer|in:1,2,3,4,5',
            'text' => 'sometimes|required|min:10',
        ];
    }
}
