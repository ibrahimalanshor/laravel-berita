<?php

use App\Models\Setting;
use App\Support\StructuredData\Features\Feature;
use App\Support\StructuredData\StructuredData;
use Illuminate\Support\Carbon;

/**
 * setting
 *
 * @param  mixed $key
 * @return string
 */
function setting(string $key): ?string
{
    $setting = cache('setting');

    if (!$setting) {
        $setting = cache()->rememberForever('setting', function () {
            $setting = Setting::first();

            return [
                'logo_url' => $setting->logo_url,
                'icon_url' => $setting->icon_url,
                'banner_url' => $setting->banner_url,
                'name' => $setting->name
            ];
        });
    }

    if (!array_key_exists($key, $setting)) {
        return null;
    }

    return $setting[$key];
}

/**
 * formatDate
 *
 * @param  mixed $date
 * @param  mixed $format
 * @param  mixed $relative
 * @return string
 */
function formatDate(string $date, string $format = 'l, d M Y', bool $relative = true): string
{
    $dateTime = Carbon::parse($date);

    if ($dateTime->diffInDays() > 1 || !$relative) {
        return $dateTime->format($format);
    }

    return $dateTime->locale('id')->diffForHumans();
}

function generateStructuredData(Feature $feature): string
{
    return StructuredData::generate($feature);
}