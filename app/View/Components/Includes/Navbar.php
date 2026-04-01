<?php

namespace App\View\Components\Includes;

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
        $this->menus = [
            'News',
            'Bisnis',
            'Ekonomi',
            'Olahraga',
        ];

        $this->tags = [
            'AS-Israel Serang Iran',
            'Board of Peace',
            'Serangan ke Aktivis KontraS',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.navbar');
    }
}
