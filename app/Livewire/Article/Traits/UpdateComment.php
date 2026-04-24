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
    abstract public function getReactions() : Collection;
    abstract public function setReactions(Collection $data);

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

        if (!$userReaction) {
            $this->addReaction($commentStored, $reaction);

            return;
        }

        if ($userReaction->reaction === $reaction) {
            $this->removeReaction($commentStored, $userReaction, $reaction);

            return;
        }

        $this->switchReaction($commentId, $userReaction, $reaction);
    }

    private function addReaction(Comment $storedComment, string $reaction)
    {
        DB::transaction(function () use ($storedComment, $reaction) {
            $updateReaction = $reaction === 'like' ? 'likes' : 'dislikes';

            $storedComment->increment($updateReaction);
            $storedComment->reactions()
                ->create([
                    'user_id' => Auth::id(),
                    'reaction' => $reaction
                ]);

            $comment = $this->getComments()->firstWhere('id', $storedComment->id);

            $this->updateComment($storedComment->id, [$updateReaction => $comment[$updateReaction] + 1]);
            $this->setReactions($this->getReactions()->put($storedComment->id, $reaction));
        });
    }

    private function removeReaction(Comment $storedComment, CommentReaction $userReaction, string $reaction)
    {
        DB::transaction(function () use ($storedComment, $userReaction, $reaction) {
            $updateReaction = $reaction === 'like' ? 'likes' : 'dislikes';
            
            $storedComment->decrement($updateReaction);
            $userReaction->delete();

            $comment = $this->getComments()->firstWhere('id', $storedComment->id);

            $this->updateComment($storedComment->id, [$updateReaction => $comment[$updateReaction] - 1]);
            $this->setReactions($this->getReactions()->forget($storedComment->id));
        });
    }

    private function switchReaction(string $commentId, CommentReaction $userReaction, string $reaction)
    {
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

            $this->setReactions($this->getReactions()->put($commentId, $reaction));
        });
    }
}