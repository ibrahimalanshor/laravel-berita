<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * article
     *
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
        
        return view('article', [
            'title' => $article->title,
            'description' => $article->summary,
            'article' => $article,
            'categoryArticles' => $categoryArticles,
            'relatedArticles' => $relatedArticles,
            'highlightArticles' => $highlightArticles,
            'editorArticles' => $editorArticles
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

        if ($user->bookmarks()->where('article_id', $article->id)->exists()) {
            $user->bookmarks()->detach($article->id);

            return back()->with('message', 'Artikel dihapus dari bookmark');
        }

        $user->bookmarks()->attach($article->id);

        return back()->with('message', 'Artikel ditambahkan ke bookmark');
    }
}
