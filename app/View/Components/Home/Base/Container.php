<?php

namespace App\View\Components\Home\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Container extends Component
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
        public $paddless = false
    )
    {
        $this->setClassList();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.base.container');
    }
    
    /**
     * setClassList
     *
     * @return void
     */
    private function setClassList()
    {
        $paddingClass = $this->paddless ? '' : 'px-4';

        $this->classList = "sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg mx-auto $paddingClass";
    }
}
