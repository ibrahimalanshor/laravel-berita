<?php

namespace App\Services;

use App\Models\Article;
use Carbon\Carbon;

class TagService
{    
    /**
     * incrementHourlyArticles
     *
     * @param  mixed $article
     * @return void
     */
    public function incrementHourlyArticles(Article $article)
    {
        $datetime = Carbon::parse($article->published_at)->startOfHour();
        
        foreach ($article->tags as $tag) {
            $hourlyArticle = $tag->hourlyArticles()
                ->firstOrCreate([
                    'datetime' => $datetime
                ]);

            $hourlyArticle->increment('articles');
        }
    }
}
