<?php

namespace App\Livewire\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ReplyForm extends Component
{
    public $commentId;
    
    #[Validate(rule: ['required', 'string', 'min:1', 'max:255'])]
    public string $content = '';

    #[Computed()]
    public function user(): ?User
    {
        if (!Auth::check()) {
            return null;
        }

        return Auth::user();
    }

    public function submit()
    {
        $this->validate();

        $comment = Comment::create([
            'reply_id' => $this->commentId,
            'user_id' => $this->user->id,
            'avatar_url' => $this->user->avatar_url,
            'name' => $this->user->name,
            'content' => $this->content,
            'likes' => 0,
            'dislikes' => 0
        ]);
            
        $this->reset('content');
    }

    public function render()
    {
        return view('livewire.comment.reply-form');
    }
}
