<?php

namespace App\Services;

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
            if ($user->subscription) {
                $user->subscription->update(['active' => false]);
            }

            $startAt = now();

            $user->subscription()->create([
                'package_id' => $package->id,
                'package_name' => $package->name,
                'package_price' => $package->price,
                'newsletter' => $package->newsletter,
                'no_ads' => $package->no_ads,
                'premium' => $package->premium,
                'premium_articles' => $package->premium_articles,
                'start_at' => $startAt,
                'end_at' => $package->premium ? $startAt->addMonth(1)->endOfDay() : null
            ]);
        });
    }
}
