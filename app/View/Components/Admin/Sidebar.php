<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Sidebar extends Component
{    
    /**
     * menus
     *
     * @var array
     */
    public $menus = [];
    
    /**
     * activeMenu
     *
     * @var mixed
     */
    public $activeMenu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->activeMenu = Route::currentRouteName();
        
        $this->menus = [
            [
                'id' => 'admin.dashboard',
                'name' => 'Dashboard'
            ],
            [
                'id' => 'admin.articles',
                'name' => 'Artikel',
                'children' => [
                    [
                        'name' => 'Daftar Artikel'
                    ],
                    [
                        'name' => 'Kategori'
                    ],
                    [
                        'name' => 'Tag'
                    ],
                ]
            ],
            [
                'id' => 'admin.pages',
                'name' => 'Halaman'
            ],
            [
                'id' => 'admin.menus',
                'name' => 'Menu'
            ],
            [
                'id' => 'admin.users',
                'name' => 'Pengguna'
            ],
            [
                'id' => 'admin.setting',
                'name' => 'Pengaturan'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar');
    }
}
