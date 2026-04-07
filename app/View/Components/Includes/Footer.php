<?php

namespace App\View\Components\Includes;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{    
    /**
     * menus
     *
     * @var mixed
     */
    public $menus;

    /**
     * navs
     *
     * @var mixed
     */
    public $navs;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('type', 'footer_category')
            ->take(10)
            ->get();

        $this->navs = Menu::where('type', 'footer_page')
            ->take(10)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.footer');
    }
}
