<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\ProductReviewRepositoryContract;
use Illuminate\Console\Command;

class DeleteProductReviewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:reviews {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete product reviews by id';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        app(ProductReviewRepositoryContract::class)->removeReviewsByProduct($this->argument('id'));

        $this->info('Product reviews successfully removed for product id: ' . $this->argument('id'));
    }
}
