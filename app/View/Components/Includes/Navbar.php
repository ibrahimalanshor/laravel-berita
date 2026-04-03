<?php

namespace App\View\Components\Includes;

use App\Models\Menu;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
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
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('type', 'navbar')
            ->get();

        $this->tags = Tag::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.navbar');
    }
}
