<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\Page;
use App\Models\Tag;
use App\Support\StructuredData\Features\CollectionPage;
use App\Support\StructuredData\Features\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $highlights = Article::orderBy('trending_score', 'desc')
            ->orderBy('published_at', 'desc')
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

        $premiumArticles = Article::latest('published_at')
            ->take(5)
            ->with('category')
            ->where('premium', true)
            ->get();

        $siteName = setting('name');

        $meta = [
            'title' => "$siteName - Berita Terkini, Trending dan Terpercaya",
            'description' => "$siteName - Berita Indonesia dan Dunia Terkini Hari Ini, Kabar Harian Terbaru Terpercaya Terlengkap Seputar Politik, Ekonomi, Travel, Teknologi, Otomotif, Bola"
        ];

        $organizationSchema = new Organization($meta['title'], $meta['description']);

        return view('index', [
            'title' => $meta['title'],
            'description' => $meta['description'],
            'highlights' => $highlights,
            'flash' => $flash,
            'editors' => $editors,
            'categories' => $categories,
            'premiumArticles' => $premiumArticles,
            'structuredData' => $organizationSchema
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
            ->orderBy('trending_score', 'desc')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->with('category')
            ->get();
        $articles = $category->articles()
            ->with('category')
            ->latest()
            ->paginate(10);

        $siteName = setting('name');

        $meta = [
            'title' => 'Berita dan Artikel Terbaru Seputar ' . $category->name . " - $siteName",
            'description' => 'Baca Berita dan Artikel Terbaru Seputar ' . $category->name . " Lengkap dan Terpercaya di $siteName",
        ];

        $articleCollection = new CollectionPage(
            name: $meta['title'],
            description: $meta['description'],
            url: url()->current(),
            items: $articles->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])->toArray()
        );

        return view('category', [
            'category' => $category,
            'highlights' => $highlights,
            'articles' => $articles,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'structuredData' => $articleCollection
        ]);
    }
    
    /**
     * featured
     *
     * @return void
     */
    public function featured()
    {
        $articles = Article::where('featured', true)
            ->with('category')
            ->latest()
            ->paginate(10);

        $siteName = setting('name');

        $meta = [
            'title' => "Berita dan Artikel Pilihan Editor - $siteName",
            'description' => "Baca Berita dan Artikel Pilihan Editor di $siteName"
        ];

        $articleCollection = new CollectionPage(
            name: $meta['title'],
            description: $meta['description'],
            url: url()->current(),
            items: $articles->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])->toArray()
        );

        return view('featured', [
            'articles' => $articles,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'structuredData' => $articleCollection
        ]);
    }
    
    /**
     * premium
     *
     * @return void
     */
    public function premium()
    {
        $articles = Article::where('premium', true)
            ->with('category')
            ->latest()
            ->paginate(10);

        $siteName = setting('name');

        $meta = [
            'title' => "Berita dan Artikel Premium - $siteName",
            'description' => "Baca Berita dan Artikel Premium di $siteName"
        ];

        $articleCollection = new CollectionPage(
            name: $meta['title'],
            description: $meta['description'],
            url: url()->current(),
            items: $articles->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])->toArray()
        );

        return view('premium', [
            'articles' => $articles,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'structuredData' => $articleCollection
        ]);
    }
    
    /**
     * news
     *
     * @return void
     */
    public function news()
    {
        $latests = Article::with('category')
            ->take(5)
            ->latest()
            ->get();
        $articles = Article::with('category')
            ->whereNotIn('id', $latests->pluck('id'))
            ->latest()
            ->paginate(10);

        $siteName = setting('name');

        $meta = [
            'title' => "Berita dan Artikel Terbaru - $siteName",
            'description' => "Baca Berita dan Artikel Terbaru di $siteName"
        ];

        $articleCollection = new CollectionPage(
            name: $meta['title'],
            description: $meta['description'],
            url: url()->current(),
            items: $latests
                ->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])
                ->merge(
                    $articles
                        ->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])
                )
                ->toArray()
        );

        return view('news', [
            'latests' => $latests,
            'articles' => $articles,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'structuredData' => $articleCollection
        ]);
    }
    
    /**
     * tag
     *
     * @param  mixed $tag
     * @return void
     */
    public function tag(Tag $tag)
    {
        $highlights = $tag->articles()
            ->orderBy('trending_score', 'desc')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->with('category')
            ->get();
        $articles = $tag->articles()
            ->with('category')
            ->latest()
            ->paginate(10);

        $siteName = setting('name');

        $meta = [
            'title' => 'Berita dan Artikel Terbaru Seputar ' . $tag->name . " - $siteName",
            'description' => 'Baca Berita dan Artikel Terbaru Seputar ' . $tag->name . " Lengkap dan Terpercaya di $siteName"
        ];

        $articleCollection = new CollectionPage(
            name: $meta['title'],
            description: $meta['description'],
            url: url()->current(),
            items: $articles->map(fn ($article) => ['name' => $article->title, 'url' => route('article.detail', ['article' => $article])])->toArray()
        );

        return view('tag', [
            'tag' => $tag,
            'highlights' => $highlights,
            'articles' => $articles,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'structuredData' => $articleCollection
        ]);
    }
    
    /**
     * page
     *
     * @param  mixed $page
     * @return void
     */
    public function page(Page $page)
    {
        $siteName = setting('name');

        return view('page', [
            'page' => $page,
            'title' => $page->title . " - $siteName",
            'description' => $page->description,
            'structuredData' => $page->toSchema()
        ]);
    }
    
    /**
     * author
     *
     * @param  mixed $author
     * @return void
     */
    public function author(Author $author)
    {
        $articles = $author->articles()
            ->with('category')
            ->latest()
            ->paginate(10);
            
        return view('author', [
            'author' => $author,
            'articles' => $articles,
            'title' => 'Profil dan Tulisan dari ' . $author->name,
            'description' => 'Profil Penulis dan Berita Tulisan dari ' . $author->name . ' Terbaru',
            'structuredData' => $author->toSchema()
        ]);
    }
    
    /**
     * search
     *
     * @param  mixed $request
     * @return void
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => ['required', 'string']
        ]);

        $q = $request->input('q');
        $articles = Article::search($q)
            ->query(fn ($query) => $query->with('category'))
            ->paginate(10)
            ->withQueryString();

        return view('search', [
            'title' => 'Hasil Pencarian "'. $q . '" Berita dan Artikel',
            'robots' => 'noindex, follow',
            'description' => 'Daftar Berita dan Artikel Sesuai Pencarian "'. $q . '"',
            'q' => $q,
            'articles' => $articles
        ]);
    }

}
