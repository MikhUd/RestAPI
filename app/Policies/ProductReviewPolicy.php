<?php

namespace App\Policies;

use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductReview $productReview)
    {
        return $user->id === $productReview->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductReview $productReview)
    {
        return $user->id === $productReview->user_id;
    }
}
