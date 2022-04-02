<?php

namespace App\Listeners;

use App\Events\ProductReviewCreated as ProductReviewCreatedEvent;
use App\Jobs\ProductReviewCreated;

class ProductReviewCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductReviewCreatedEvent $event)
    {
        dispatch(new ProductReviewCreated($event->productReview));
    }
}
