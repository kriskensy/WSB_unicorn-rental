<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function view(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    public function update(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
