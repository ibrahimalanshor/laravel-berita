<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
            
    /**
     * react
     *
     * @param  mixed $comment
     * @param  mixed $request
     * @param  mixed $commentService
     * @return void
     */
    public function react(Comment $comment, Request $request, CommentService $commentService)
    {
        $request->validate([
            'reaction' => ['required', 'in:like,dislike']
        ]);

        $commentService->react($comment, $request->user(), $request->input('reaction'));

        return back();
    }

    public function loadMore(Request $request)
    {
        $request->validate([
            'article_id' => ['required', 'exists:articles,id'],
            'page' => ['required', 'integer', 'min:1']
        ]);

        $article = Article::find($request->input('article_id'));

        $user = $request->user();
        $skip = ($request->input('page') - 1) * 10;

        $comments = $article->comments()
            ->whereNull('reply_id')
            ->with('replies')
            ->skip($skip)
            ->take(10)
            ->latest()
            ->get();

        $allCommentId = $comments->flatMap(function ($comment) {
                return collect([$comment->id])
                    ->merge($comment->replies->pluck('id'));
            })
            ->values();
        $reactions = !Auth::check() ? collect() : $user->commentReactions()
            ->whereIn('comment_id', $allCommentId)
            ->get()
            ->mapWithKeys(fn ($reaction) => [$reaction->comment_id => $reaction->reaction]);

        return view('comment.page', [
            'article' => $article,
            'comments' => $comments,
            'reactions' => $reactions
        ]);
    }

}
