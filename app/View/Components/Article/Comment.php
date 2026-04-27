<?php

namespace App\View\Components\Article;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Comment extends Component
{    
    /**
     * comments
     *
     * @var mixed
     */
    public Collection $comments;
    
    /**
     * reactions
     *
     * @var mixed
     */
    public Collection $reactions;

    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article)
    {
        $user = Auth::user();
        $this->comments = $article->comments()
            ->whereNull('reply_id')
            ->with('replies')
            ->take(10)
            ->latest()
            ->get();

        $allCommentId = $this->comments->flatMap(function ($comment) {
                return collect([$comment->id])
                    ->merge($comment->replies->pluck('id'));
            })
            ->values();

        $this->reactions = !Auth::check() ? collect() : $user->commentReactions()
            ->whereIn('comment_id', $allCommentId)
            ->get()
            ->mapWithKeys(fn ($reaction) => [$reaction->comment_id => $reaction->reaction]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.comment');
    }
}
