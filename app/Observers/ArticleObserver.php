<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\TagService;

class ArticleObserver
{    
    /**
     * __construct
     *
     * @param  mixed $tagService
     * @return void
     */
    public function __construct(public TagService $tagService) {}

    /**
     * Handle the Article "saving" event.
     */
    public function saving(Article $article): void
    {
        if ($article->published_at && $article->isDirty('published_at')) {
            $this->tagService->incrementHourlyArticles($article);
        }
    }
}
