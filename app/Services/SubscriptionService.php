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

        $user->subscription()->create([
            'period' => $period,
            'start_at' => $startAt,
            'end_at' => $startAt->copy()->add(1, $period)
        ]);
    }
}
