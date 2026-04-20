<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{    
    /**
     * classList
     *
     * @var mixed
     */
    public $classList;
    

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $icon = null,
        public $color = 'light',
        public $size = 'md',
        public $ignoreDisplay = false,
        public $tagName = 'button'
    )
    {
        $this->setClassList();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.button');
    }
    
    /**
     * setClassList
     *
     * @return void
     */
    private function setClassList()
    {
        $colorClass = match($this->color) {
            'light' => 'bg-white text-neutral-900',
            'bordered' => 'bg-white border border-neutral-300 text-neutral-900 hover:bg-neutral-100',
            'primary' => 'bg-red-700 text-white hover:bg-red-800'
        };

        $sizeClass = match($this->size) {
            'sm' => 'h-9 px-3 rounded-md',
            'md' => 'h-10 px-4 rounded-md',
            'custom' => ''
        };

        $displayClass = $this->ignoreDisplay ? '' : 'inline-flex items-center justify-center';

        $this->classList = "$displayClass $colorClass $sizeClass cursor-pointer";
    }
}
