<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SubscriptionPackage extends Model
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function (SubscriptionPackage $package) {
            Cache::forget('subs_package');
            Cache::rememberForever('subs_package', function () use ($package) {
                return [
                    'logo_url' => $package->logo_url,
                    'icon_url' => $package->icon_url,
                    'name' => $package->name
                ];
            });
        });
    }
}
