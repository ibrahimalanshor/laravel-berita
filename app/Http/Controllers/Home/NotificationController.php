<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification)
    {
        abort_if($notification->read(), 403);

        $notification->markAsRead();

        if ($notification->type === 'App\Notifications\CommentReacted' || $notification->type === 'App\Notifications\CommentReplied') {
            return redirect($notification->data['article_url']);
        }

        return redirect()->route('profile.subscription');
    }

    public function readAll(Request $request)
    {   
        $request->user()
            ->notifications()
            ->unread()
            ->update([
                'read_at' => now()
            ]);

        return back();
    }
}
