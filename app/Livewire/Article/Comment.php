<?php

namespace App\Livewire\Article;

use App\Livewire\Article\Traits\UpdateComment;
use App\Models\Article;
use App\Models\Comment as CommentModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Comment extends Component
{    
    use UpdateComment;

    public Article $article;
    public CommentModel $replyComment;
    public Collection $comments;
    public Collection $reactions;
    public ?int $replyId = null;
    
    #[Validate(rule: ['required', 'string', 'min:1', 'max:255'])]
    public string $newComment = '';

    #[Computed]
    public function user(): ?User
    {
        if (!Auth::check()) {
            return null;
        }

        return Auth::user();
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $data)
    {
        $this->comments = $data;
    }

    public function getReactions(): Collection
    {
        return $this->reactions;
    }

    public function setReactions(Collection $data)
    {
        $this->reactions = $data;
    }

    public function mount()
    {        
        if (!$this->replyId) {
            $this->comments = $this->article->comments()
                ->whereNull('reply_id')
                ->latest()
                ->take(10)
                ->get()
                ->map(fn ($comment) => $this->mapCommentData($comment));
        } else {
            $this->replyComment = CommentModel::find($this->replyId);
            $this->comments = CommentModel::where('reply_id', $this->replyId)
                ->oldest()
                ->take(10)
                ->get()
                ->map(fn ($comment) => $this->mapCommentData($comment));
        }
        $this->reactions = !Auth::check() ? collect() : $this->user->commentReactions()
            ->whereIn('comment_id', $this->comments->pluck('id'))
            ->get()
            ->mapWithKeys(fn ($reaction) => [$reaction->comment_id => $reaction->reaction]);
    }

    private function mapCommentData(CommentModel $comment)
    {
        return [
            'id' => $comment->id,
            'avatar_url' => $comment->avatar_url,
            'name' => $comment->name,
            'reply_name' => $comment->reply_name,
            'content' => $comment->content,
            'created_at' => $comment->created_at,
            'likes' => $comment->likes,
            'dislikes' => $comment->dislikes,
            'has_replies' => $comment->replies_count > 0
        ];
    }

    public function submitNewComment()
    {
        $this->validate();

        $comment = CommentModel::create([
            'article_id' => !$this->replyId ? $this->article->id : null,
            'user_id' => $this->user->id,
            'reply_id' => $this->replyId,
            'avatar_url' => $this->user->avatar_url,
            'name' => $this->user->name,
            'content' => $this->newComment,
            'likes' => 0,
            'dislikes' => 0,
            'replies_count' => 0
        ]);
            
        $this->reset('newComment');

        if ($this->replyId) {
            $this->comments->push($this->mapCommentData($comment));
        } else {
            $this->comments->unshift($this->mapCommentData($comment));
        }
    }

    public function cancelReply()
    {
        $this->reset('newComment');
    }

    public function render()
    {
        return view('livewire.article.comment');
    }
}
