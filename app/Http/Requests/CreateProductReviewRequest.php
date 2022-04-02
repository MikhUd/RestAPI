<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'rating' => 'required|integer|in:1,2,3,4,5',
            'text' => 'required|min:10',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'product_id' => (int)$this->product_id,
            'rating' => (int)$this->rating,
        ]);
    }
}
