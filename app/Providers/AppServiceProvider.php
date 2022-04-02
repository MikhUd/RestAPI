<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use App\Repositories\Interfaces\ProductRepositoryContract;
use App\Repositories\Interfaces\ProductReviewRepositoryContract;
use App\Repositories\Interfaces\UserRepositoryContract;
use App\Repositories\ProductRepository;
use App\Repositories\ProductReviewRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceContract;
use App\Services\Interfaces\ProductReviewServiceContract;
use App\Services\Interfaces\ProductServiceContract;
use App\Services\Interfaces\UserServiceContract;
use App\Services\ProductReviewService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, function () {
            return new UserRepository(new User());
        });

        $this->app->bind(ProductRepositoryContract::class, function () {
            return new ProductRepository(new Product());
        });

        $this->app->bind(ProductReviewRepositoryContract::class, function () {
            return new ProductReviewRepository(new ProductReview());
        });

        $this->app->bind(UserServiceContract::class, UserService::class);

        $this->app->bind(AuthServiceContract::class, AuthService::class);

        $this->app->bind(ProductServiceContract::class, ProductService::class);

        $this->app->bind(ProductReviewServiceContract::class, ProductReviewService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
