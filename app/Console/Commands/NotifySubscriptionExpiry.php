<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Notifications\SubscriptionExpired;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:notify-subscription-expiry')]
#[Description('Command description')]
class NotifySubscriptionExpiry extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = now();

        $subscriptions = Subscription::where('start_at', '<=', $now)
            ->where('end_at', '>=', $now->copy())
            ->whereBetween('end_at', [$now, $now->copy()->addDays(2)->startOf('day')]);

        foreach ($subscriptions->cursor() as $subscription) {
            $subscription->user->notify(new SubscriptionExpired($subscription));
        }
    }
}
