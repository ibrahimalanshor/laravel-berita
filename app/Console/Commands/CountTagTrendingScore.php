<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:count-tag-trending-score')]
#[Description('Command description')]
class CountTagTrendingScore extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Tag::query()
            ->update([
                'trending_score' => 0
            ]);

        $tagHourlyArticles = DB::table('tag_hourly_articles')
            ->where('date', '>=', now()->startOfDay())
            ->selectRaw('tag_id, SUM(articles) articles')
            ->groupBy('tag_id')
            ->get()
            ->keyBy('tag_id');

        $tags = Tag::whereIn('id', $tagHourlyArticles->keys())
            ->cursor();

        foreach ($tags as $tag) {
            $dailyArticles = $tagHourlyArticles[$tag->id];
            $articles = $dailyArticles->articles;

            $tag->update([
                'trending_score' => $articles
            ]);
        }
    }
}
