<?php

namespace App\Services;

use App\Models\User;

class SubscriptionService
{
    /**
     * hasAccessToPremiumArticles
     *
     * @param  mixed $user
     * @return bool
     */
    public function hasAccessToPremiumArticles(User $user): bool
    {
        if (!$user->subscription) {
            return false;
        }

        return $user->subscription->premium_articles;
    }
}
