<?php

namespace App\View\Components\Home\Includes;

use App\Models\Menu;
use App\Models\SocialLink;
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
     * socials
     *
     * @var mixed
     */
    public $socials;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('type', 'footer_category')
            ->with('category')
            ->take(10)
            ->get();

        $this->navs = Menu::where('type', 'footer_page')
            ->with('page')
            ->take(10)
            ->get();

        $this->socials = SocialLink::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.includes.footer');
    }
}
