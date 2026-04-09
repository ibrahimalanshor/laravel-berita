<?php

namespace App\View\Components\Article;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Share extends Component
{    
    /**
     * shareText
     *
     * @var mixed
     */
    public $shareText;
    
    /**
     * mailText
     *
     * @var mixed
     */
    public $mailText;

    /**
     * Create a new component instance.
     */
    public function __construct(Article $article)
    {
        $this->shareText = $article->title . "\n" . request()->uri();
        $this->mailText = "mailto:?subject=" . urlencode($article->title) . "&body=Baca artikel lengkapnya di " . urlencode(request()->url());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.share');
    }
}
