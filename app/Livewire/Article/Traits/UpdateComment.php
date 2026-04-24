<?php

namespace App\Livewire\Article\Traits;

use App\Models\Comment;
use App\Models\CommentReaction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait UpdateComment
{
    abstract public function getComments() : Collection;
    abstract public function setComments(Collection $data);

    private function getUserReaction(Comment $comment): ?CommentReaction
    {
        return $comment->reactions()
            ->firstWhere('user_id', Auth::id());
    }
    
    public function updateComment(int $id, array $data)
    {
        $this->setComments($this->getComments()->map(function ($comment) use ($id, $data) {
            if ($comment['id']!== $id) {
                return $comment;
            }

            return [
                ...$comment,
                ...$data
            ];
        }));
    }

    public function react(int $commentId, string $reaction)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $commentStored = Comment::find($commentId);

        $userReaction = $this->getUserReaction($commentStored);
        $updateColumn = $reaction === 'like' ? 'likes' : 'dislikes';

        if (!$userReaction) {
            return DB::transaction(function () use ($commentStored, $updateColumn, $commentId, $reaction) {
                $commentStored->increment($updateColumn);
                $commentStored->reactions()
                    ->create([
                        'user_id' => Auth::id(),
                        'reaction' => $reaction
                    ]);

                $comment = $this->getComments()->firstWhere('id', $commentId);

                $this->updateComment($commentId, [$updateColumn => $comment[$updateColumn] + 1]);
            });
        }

        if ($userReaction->reaction === $reaction) {
            return DB::transaction(function () use ($commentStored, $commentId, $reaction, $userReaction, $updateColumn) {
                $commentStored->decrement($updateColumn);
                $userReaction->delete();

                $comment = $this->getComments()->firstWhere('id', $commentId);

                $this->updateComment($commentId, [$updateColumn => $comment[$updateColumn] - 1]);
            });
        }

        DB::transaction(function() use ($commentId, $reaction, $userReaction) {
            Comment::where('id', $commentId)
                ->update(
                    $reaction === 'like'
                        ? ['likes' => DB::raw('likes + 1'), 'dislikes' => DB::raw('dislikes - 1')]
                        : ['likes' => DB::raw('likes - 1'), 'dislikes' => DB::raw('dislikes + 1')]
                );
            $userReaction->update([
                'reaction' => $reaction
            ]);

            $comment = $this->getComments()->firstWhere('id', $commentId);

            $this->updateComment(
                $commentId,
                $reaction === 'like'
                    ? ['likes' => $comment['likes'] + 1, 'dislikes' => $comment['dislikes'] - 1]
                    : ['likes' => $comment['likes'] - 1, 'dislikes' => $comment['dislikes'] + 1]
            );
        });
    }
}