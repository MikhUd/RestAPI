<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ProductServiceContract;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
        private ProductServiceContract $productService,
    ) {}

    public function getProductWithRating(Request $request)
    {
        return $this->productService->getProductWithRating($request);
    }

    public function getProductListByFilter(Request $request)
    {
        return $this->productService->getProductListByFilter($request);
    }

    public function getProductListHavingUserReview(Request $request)
    {
        return $this->productService->getProductListHavingUserReview($request);
    }
}
