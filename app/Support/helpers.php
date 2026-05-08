<?php

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
        return null;
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
 * @return string
 */
function formatDate(string $date, string $format = 'l, d M Y'): string
{
    $dateTime = Carbon::parse($date);

    if ($dateTime->diffInDays() > 1) {
        return $dateTime->format($format);
    }

    return $dateTime->locale('id')->diffForHumans();
}

function generateStructuredData(Feature $feature): string
{
    return StructuredData::generate($feature);
}