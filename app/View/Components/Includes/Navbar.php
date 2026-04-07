<?php

namespace App\View\Components\Includes;

use App\Models\Menu;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navbar extends Component
{    
    /**
     * menus
     *
     * @var mixed
     */
    public $menus;

    /**
     * tags
     *
     * @var mixed
     */
    public $tags;
    
    /**
     * displayTag
     *
     * @var mixed
     */
    public bool $displayTag;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('type', 'navbar')
            ->take(4)
            ->get();

        $this->displayTag = Route::currentRouteName() === 'home';

        if ($this->displayTag) {
            $this->tags = Tag::get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.navbar');
    }
}
