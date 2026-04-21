<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\SubscriptionPackage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
     * @param  mixed $package
     * @return void
     */
    public function subscribe(User $user, SubscriptionPackage $package)
    {
        DB::transaction(function () use ($user, $package) {
            $startAt = now();

            if ($user->subscription) {
                if (!$user->subscription->end_at) {
                    $user->subscription->update(['end_at' => $startAt->subSecond()]);
                } else {
                    $startAt = $user->subscription->end_at->copy()->addSecond();
                }
            }

            $user->subscription()->create([
                'package_id' => $package->id,
                'package_name' => $package->name,
                'package_price' => $package->price,
                'newsletter' => $package->newsletter,
                'no_ads' => $package->no_ads,
                'premium' => $package->premium,
                'premium_articles' => $package->premium_articles,
                'start_at' => $startAt,
                'end_at' => $package->premium ? $startAt->copy()->addMonth(1)->endOfDay() : null
            ]);
        });
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
