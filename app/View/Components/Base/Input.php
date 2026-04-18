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
     * messageClassList
     *
     * @var mixed
     */
    public $messageClassList;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $size = 'md',
        public $color = 'light',
        public $type = 'text',
        public $message = null
    )
    {
        $this->setClassList();
        $this->setMessageClassList();
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
            'md' => $this->type !== 'file' ? 'h-10 px-3 rounded-md' : 'h-10 pr-3 rounded-md',
            'custom' => ''
        };

        $colorClass = match ($this->color) {
            'light' => 'border border-neutral-300 text-neutral-900',
            'error' => 'border border-red-700 text-red-900',
            'custom' => ''
        };

        $fileClass = 'file:bg-neutral-100 file:h-full file:text-neutral-700 file:px-3 file:border-r file:border-neutral-300 file:mr-3';
        
        $this->classList = "$sizeClass $colorClass $fileClass w-full overflow-hidden placeholder-neutral-400 border transition-border focus:outline-0";
    }
    
    /**
     * setMessageClassList
     *
     * @return void
     */
    private function setMessageClassList()
    {
        $colorClass = match ($this->color) {
            'light' => 'text-neutral-500',
            'error' => 'text-red-700',
            'custom' => ''
        };
        
        $this->messageClassList = "$colorClass";
    }
}
