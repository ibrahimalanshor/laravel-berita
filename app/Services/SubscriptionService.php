<?php

namespace App\Services;

use App\Models\SubscriptionPackage;
use App\Models\User;

class SubscriptionService
{
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
        $package = SubscriptionPackage::first();

        $user->subscription()->create([
            'price' => $period === 'month' ? $package->monthly_price : $package->yearly_price,
            'period' => $period,
            'start_at' => $startAt,
            'end_at' => $startAt->copy()->add(1, $period)->endOfDay()
        ]);
    }
}
