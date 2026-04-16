<?php

namespace App\View\Components\Article;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Action extends Component
{    
    /**
     * bookmarked
     *
     * @var bool
     */
    public bool $bookmarked = false;

    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article)
    {
        $user = Auth::user();

        $this->bookmarked = $user->bookmarks()
            ->where('article_id', $article->id)
            ->exists();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.action');
    }
}
