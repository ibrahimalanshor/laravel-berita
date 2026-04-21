<?php

namespace App\Services;

use App\Models\SubscriptionPackage;
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
    
    /**
     * subscribe
     *
     * @param  mixed $user
     * @param  mixed $period
     * @return void
     */
    public function subscribe(User $user, string $period)
    {
        $startAt = now();

        $user->subscription()->create([
            'period' => $period,
            'start_at' => $startAt,
            'end_at' => $startAt->copy()->add(1, $period)
        ]);
    }
     
    /**
     * getFutureSubscription
     *
     * @param  mixed $user
     * @param  mixed $package
     * @return mixed
     */
    public function getFutureSubscription(User $user, SubscriptionPackage $package): mixed
    {
        return $user->subscriptions()
            ->where('package_id', $package->id)
            ->where('start_at', '>', now())
            ->first();
    }
}
