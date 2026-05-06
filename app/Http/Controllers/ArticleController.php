<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SubscriptionPackage;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{        
    /**
     * view
     *
     * @param  mixed $article
     * @param  mixed $articleService
     * @return void
     */
    public function view(Article $article, ArticleService $articleService)
    {
        $articleService->incrementDailyView($article);

        $article->load('category', 'tags', 'author');

        $categoryArticles = $article->category
            ->articles()
            ->where('id', '!=', $article->id)
            ->with('category')
            ->latest('published_at')
            ->take(6)
            ->get();

        $relatedArticles = Article::where('id', '!=', $article->id)
            ->whereHas('tags', function ($query) use ($article) {
                $query->whereIn('tags.id', $article->tags->pluck('id'));
            })
            ->latest('published_at')
            ->take(6)
            ->get();

        $highlightArticles = Article::orderBy('trending_score', 'desc')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->with('category')
            ->get();

        $editorArticles = Article::latest('published_at')
            ->take(5)
            ->with('category')
            ->where('featured', true)
            ->get();

        $package = SubscriptionPackage::first();

        $packages = [
            [
                'name' => 'Bulanan',
                'period' => 'month',
                'period_name' => 'bulan',
                'price' => $package->monthly_price,
                'featured' => true
            ],
            [
                'name' => 'Tahunan',
                'period' => 'year',
                'period_name' => 'tahun',
                'price' => $package->yearly_price,
                'featured' => false
            ]
        ];

        $subscription = !Auth::check() ? null : Auth::user()->subscription;
        
        return view('article', [
            'title' => $article->title,
            'description' => $article->summary,
            'article' => $article,
            'categoryArticles' => $categoryArticles,
            'relatedArticles' => $relatedArticles,
            'highlightArticles' => $highlightArticles,
            'editorArticles' => $editorArticles,
            'packages' => $packages,
            'subscription' => $subscription
        ]);
    }
    
    /**
     * bookmark
     *
     * @param  mixed $article
     * @param  mixed $request
     * @return void
     */
    public function bookmark(Article $article, Request $request)
    {
        $user = $request->user();
        $bookmarked = $user->bookmarks()
            ->where('article_id', $article->id)
            ->wherePivot('type', 'bookmark')
            ->exists();

        if ($bookmarked) {
            $user->bookmarks()
                ->wherePivot('type', 'bookmark')
                ->detach($article->id, ['type' => 'bookmark']);

            return back()->with('message', 'Artikel dihapus dari baca nanti');
        }

        $user->bookmarks()->attach($article->id, ['type' => 'bookmark']);

        return back()->with('message', 'Artikel ditambahkan ke baca nanti');
    }
    
    /**
     * favorite
     *
     * @param  mixed $article
     * @param  mixed $request
     * @return void
     */
    public function favorite(Article $article, Request $request)
    {
        $user = $request->user();
        $favourited = $user->bookmarks()
            ->where('article_id', $article->id)
            ->wherePivot('type', 'favorite')
            ->exists();

        if ($favourited) {
            $user->bookmarks()
                ->wherePivot('type', 'favorite')
                ->detach($article->id, ['type' => 'favorite']);

            return back()->with('message', 'Artikel dihapus dari favorit');
        }

        $user->bookmarks()->attach($article->id, ['type' => 'favorite']);

        return back()->with('message', 'Artikel ditambahkan ke favorit');
    }
    
    /**
     * comment
     *
     * @param  mixed $article
     * @param  mixed $request
     * @return void
     */
    public function comment(Article $article, Request $request)
    {
        if ($article->premium) {
            Gate::authorize('subscribed');
        }

        $request->validate([
            'content' => ['required', 'string', 'min:0', 'max:255'],
            'reply_id' => ['nullable', 'integer'],
            'mention_id' => ['nullable', 'integer']
        ]);

        $user = $request->user();
        $replyId = $request->input('reply_id');
        $mentionId = $request->input('mention_id');

        $replyName = null;

        if ($replyId) {
            $reply = $article->comments()
                ->where('id', $replyId)
                ->whereNull('reply_id')
                ->first();

            abort_if(!$reply, 400);

            $replyName = $reply->name;
        }

        if ($mentionId) {
            abort_if(!$replyId, 400);

            if ($mentionId !== $replyId) {
                $mention = $article->comments()
                    ->where('id', $mentionId)
                    ->where('reply_id', $replyId)
                    ->first();

                abort_if(!$mention, 400);

                $replyName = $mention->name;
            }
        }
        
        $article->comments()
            ->create([
                'user_id' => $user->id,
                'reply_id' => $replyId,
                'avatar_url' => $user->avatar_url,
                'name' => $user->name,
                'reply_name' => $replyName,
                'content' => $request->input('content'),
                'likes' => 0,
                'dislikes' => 0,
                'replies_count' => 0
            ]);

        return back()->withFragment('komentar');
    }
}
