<?php

namespace App\View\Components\Includes;

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
    public array $menus;

    /**
     * navs
     *
     * @var mixed
     */
    public array $navs;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = [
            'Nasional',
            'Teknologi',
            'Otomotif',
            'Internasional',
            'Hiburan',
            'Ekonomi',
            'Gaya Hidup',
            'Olahraga',
            'Download Apps',
            'berbuatbaik.id',
        ];

        $this->navs = [
            'Redaksi',
            'Ketentuan Penggunaan',
            'Kebijakan Privasi',
            'Kebijakan Cookie',
            'Pedoman Media Siber',
            'ANTARA Foto',
            'Kabarin.com',
            'BrandA',
            'Korporat',
            'PPID',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.footer');
    }
}
