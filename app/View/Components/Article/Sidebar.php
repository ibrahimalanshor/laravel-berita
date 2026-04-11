<?php

namespace App\View\Components\Article;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{    
    /**
     * highlightArticles
     *
     * @var mixed
     */
    public $highlightArticles;
        
    /**
     * editorArticles
     *
     * @var mixed
     */
    public $editorArticles;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->highlightArticles = Article::inRandomOrder()
            ->take(5)
            ->with('category')
            ->get();

        $this->editorArticles = Article::latest('published_at')
            ->take(5)
            ->with('category')
            ->where('featured', true)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.sidebar');
    }
}
