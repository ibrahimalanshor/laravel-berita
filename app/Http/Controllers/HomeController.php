<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
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

}
