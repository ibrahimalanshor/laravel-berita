<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
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
        public $size = 'md',
        public $color = 'light'
    )
    {
        $this->setClassList();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.input');
    }
    
    /**
     * setClassList
     *
     * @return void
     */
    private function setClassList()
    {
        $sizeClass = match ($this->size) {
            'sm' => 'h-9 px-3 rounded-md',
            'md' => '',
            'custom' => ''
        };

        $colorClass = match ($this->color) {
            'light' => '',
            'custom' => ''
        };
        
        $this->classList = "$sizeClass $colorClass placeholder-neutral-400 border transition-border focus:outline-0";
    }
}
