<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

#[Signature('app:count-article-trending-score')]
#[Description('Command description')]
class CountArticleTrendingScore extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Article::query()
            ->update([
                'trending_score' => 0
            ]);

        $articleDailyViews = DB::table('article_daily_views')
            ->where('date', '>', now()->subWeek())
            ->selectRaw('article_id, SUM(session_views) views')
            ->groupBy('article_id')
            ->get()
            ->keyBy('article_id');

        $articles = Article::whereIn('id', $articleDailyViews->keys())
            ->get();

        $updates = $articles->map(function ($article) use ($articleDailyViews) {
            $dailyViews = $articleDailyViews[$article->id];
            $views = $dailyViews->views;

            return [
                'id' => $article->id,
                'trending_score' => $views / pow((Carbon::parse($article->published_at)->diffInHours(now()) + 2), 1.5)
            ];
        });

        DB::table('articles')
            ->upsert($updates->toArray(), ['id'], ['trending_score']);
    }
}
