<?php

use App\Console\Commands\CountArticleTrendingScore;
use App\Console\Commands\CountTagTrendingScore;
use App\Console\Commands\CreateSitemap;
use App\Console\Commands\NotifySubscriptionExpiry;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(NotifySubscriptionExpiry::class)
    ->dailyAt('00:00');
Schedule::command(CountArticleTrendingScore::class)
    ->hourly();
Schedule::command(CountTagTrendingScore::class)
    ->everyFifteenMinutes();
Schedule::command(CreateSitemap::class)
    ->everyFifteenMinutes();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
