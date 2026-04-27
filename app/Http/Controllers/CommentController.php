<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

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

}
