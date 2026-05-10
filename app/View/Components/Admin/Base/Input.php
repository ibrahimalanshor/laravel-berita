<?php

namespace App\View\Components\Admin\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{    
    /**
     * classList
     *
     * @var string
     */
    public $classList = '';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $color = 'light')
    {
        $this->setClassList();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.base.input');
    }
    
    /**
     * setClassList
     *
     * @return void
     */
    private function setClassList()
    {
        $colorClass = match ($this->color) {
            'light' => 'border-neutral-300 placeholder-neutral-500 text-neutral-900 focus:border-red-700 focus:ring-red-700',
            'error' => 'border-red-700 placeholder-red-700 text-red-900 focus:border-red-700 focus:ring-red-700'
        };

        $this->classList = "$colorClass";
    }
}
