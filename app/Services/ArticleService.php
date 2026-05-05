<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Session;

class ArticleService
{    
    /**
     * incrementDailyView
     *
     * @param  mixed $article
     * @return void
     */
    public function incrementDailyView(Article $article)
    {
        $articleDailyView = $article->dailyViews()
            ->firstOrCreate([
                'date' => now()->format('Y-m-d')
            ]);

        $articleDailyView->increment('views');

        $viewedInSession = Session::get('viewed_articles', []);

        if (!in_array($article->id, $viewedInSession)) {
            $articleDailyView->increment('session_views');

            Session::push('viewed_articles', $article->id);
        }
    }
}
