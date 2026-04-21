<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{    
    /**
     * view
     *
     * @param  mixed $article
     * @param  mixed $subscriptionService
     * @return void
     */
    public function view(Article $article)
    {
        $article->load('category', 'tags', 'author');

        $categoryArticles = $article->category
            ->articles()
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

        $highlightArticles = Article::inRandomOrder()
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

        $hasSubscription = !Auth::check() ? false : Auth::user()->subscription;
        
        return view('article', [
            'title' => $article->title,
            'description' => $article->summary,
            'article' => $article,
            'categoryArticles' => $categoryArticles,
            'relatedArticles' => $relatedArticles,
            'highlightArticles' => $highlightArticles,
            'editorArticles' => $editorArticles,
            'packages' => $packages,
            'hasSubscription' => $hasSubscription
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
}
