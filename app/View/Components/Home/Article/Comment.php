<?php

namespace App\View\Components\Home\Article;

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
     * total
     *
     * @var mixed
     */
    public $total;
    
    /**
     * sort
     *
     * @var mixed
     */
    public string $sort;

    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article)
    {
        $user = Auth::user();

        $this->sort = request('sort', 'latest');

        $query = $article->comments()
            ->whereNull('reply_id');

        $this->total = $query->count();
        $this->comments = $query->with(['replies' => fn ($reply) => $reply->take(3)])
            ->take(10)
            ->when($this->sort === 'latest', fn ($query) => $query->latest())
            ->when($this->sort === 'oldest', fn ($query) => $query->oldest())
            ->when($this->sort === 'popular', fn ($query) => $query->orderByRaw('replies_count + likes DESC, created_at DESC'))
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
        return view('components.home.article.comment');
    }
}
