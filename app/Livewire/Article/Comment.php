<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Comment extends Component
{    
    public Article $article;
    public Collection $comments;
    
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

    public function mount()
    {        
        $this->comments = $this->article->comments()
            ->latest()
            ->take(10)
            ->get();
    }

    public function submitNewComment()
    {
        $this->validate();

        $comment = $this->article->comments()
            ->create([
                'user_id' => $this->user->id,
                'avatar_url' => $this->user->avatar_url,
                'name' => $this->user->name,
                'content' => $this->newComment,
                'likes' => 0,
                'dislikes' => 0
            ]);
            
        $this->reset('newComment');

        $this->comments->unshift($comment);
    }

    public function render()
    {
        return view('livewire.article.comment');
    }
}
