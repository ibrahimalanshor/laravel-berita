<?php

use Illuminate\Support\Carbon;

function setting(string $key) : string | null
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

function formatDate(string $date) : string
{
    return Carbon::parse($date)->format('l, d M Y');
}