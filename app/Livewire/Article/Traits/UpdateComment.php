<?php

namespace App\Livewire\Article\Traits;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

trait UpdateComment
{
    public function updateComment(int $id, array $data)
    {
        $this->comments = $this->comments->map(function ($comment) use ($id, $data) {
            if ($comment['id']!== $id) {
                return $comment;
            }

            return [
                ...$comment,
                ...$data
            ];
        });
    }

    public function like(int $commentId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $comment = Comment::find($commentId);

        $comment->increment('likes');

        $comment = $this->comments->firstWhere('id', $commentId);

        $this->updateComment($commentId, ['likes' => $comment['likes'] + 1]);
    }

    public function dislike(int $commentId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $comment = Comment::find($commentId);

        $comment->increment('dislikes');

        $comment = $this->comments->firstWhere('id', $commentId);

        $this->updateComment($commentId, ['dislikes' => $comment['dislikes'] + 1]);
    }
}