<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;

class HomeController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $highlights = Article::inRandomOrder()
            ->take(5)
            ->with('category')
            ->get();

        $flash = Article::latest('published_at')
            ->take(15)
            ->with('category')
            ->get();

        $editors = Article::latest('published_at')
            ->take(5)
            ->with('category')
            ->where('featured', true)
            ->get();

        $categories = ArticleCategory::where('featured', true)
            ->take(3)
            ->with([
                'articles' => fn ($query) => $query->limit(5)
            ])
            ->get();

        return view('index', [
            'title' => 'Lararita - Berita Terkini, Trending dan Terpercaya',
            'description' => 'Lararita - Berita Indonesia dan Dunia Terkini Hari Ini, Kabar Harian Terbaru Terpercaya Terlengkap Seputar Politik, Ekonomi, Travel, Teknologi, Otomotif, Bola',
            'highlights' => $highlights,
            'flash' => $flash,
            'editors' => $editors,
            'categories' => $categories
        ]);
    }
    
    /**
     * article
     *
     * @return void
     */
    public function article(Article $article)
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
     * category
     *
     * @param  mixed $category
     * @return void
     */
    public function category(ArticleCategory $category)
    {
        $highlights = $category->articles()
            ->inRandomOrder()
            ->take(5)
            ->with('category')
            ->get();
        $categoryArticles = $category->articles()
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('category', [
            'category' => $category,
            'highlights' => $highlights,
            'categoryArticles' => $categoryArticles,
            'title' => 'Berita dan Artikel Terbaru Seputar ' . $category->name,
            'description' => 'Baca Berita dan Artikel Terbaru Seputar ' . $category->name . ' Lengkap dan Terpercaya'
        ]);
    }

}
