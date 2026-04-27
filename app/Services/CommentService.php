<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommentService
{      
    /**
     * react
     *
     * @param  mixed $comment
     * @param  mixed $user
     * @param  mixed $reaction
     * @return void
     */
    public function react(Comment $comment, User $user, string $reaction)
    {
        $userReaction = $this->getUserReaction($comment, $user);

        if (!$userReaction) {
            $this->addReaction($comment, $user, $reaction);

            return;
        }

        if ($userReaction->reaction === $reaction) {
            $this->removeReaction($comment, $userReaction, $reaction);

            return;
        }

        $this->switchReaction($comment, $userReaction, $reaction);
    }
    
    /**
     * getUserReaction
     *
     * @param  mixed $comment
     * @param  mixed $user
     * @return CommentReaction
     */
    private function getUserReaction(Comment $comment, User $user): ?CommentReaction
    {
        return $comment->reactions()
            ->firstWhere('user_id', $user->id);
    }

    private function addReaction(Comment $comment, User $user, string $reaction)
    {
        DB::transaction(function () use ($comment, $user, $reaction) {
            $updateReaction = $reaction === 'like' ? 'likes' : 'dislikes';

            $comment->increment($updateReaction);
            $comment->reactions()
                ->create([
                    'user_id' => $user->id,
                    'reaction' => $reaction
                ]);
        });
    }

    private function removeReaction(Comment $comment, CommentReaction $userReaction, string $reaction)
    {
        DB::transaction(function () use ($comment, $userReaction, $reaction) {
            $updateReaction = $reaction === 'like' ? 'likes' : 'dislikes';
            
            $comment->decrement($updateReaction);
            $userReaction->delete();
        });
    }

    private function switchReaction(Comment $comment, CommentReaction $userReaction, string $reaction)
    {
        DB::transaction(function() use ($comment, $reaction, $userReaction) {
            $comment->update(
                $reaction === 'like'
                    ? ['likes' => DB::raw('likes + 1'), 'dislikes' => DB::raw('dislikes - 1')]
                    : ['likes' => DB::raw('likes - 1'), 'dislikes' => DB::raw('dislikes + 1')]
            );
            $userReaction->update([
                'reaction' => $reaction
            ]);
        });
    }
}
