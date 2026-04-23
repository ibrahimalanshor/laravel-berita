<?php

namespace App\View\Components\Article;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{    
    /**
     * comments
     *
     * @var mixed
     */
    public $comments;

    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article)
    {
        $this->comments = $this->article->comments()
            ->take(10)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.comment');
    }
}
