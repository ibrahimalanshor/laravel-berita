<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{    
    /**
     * classList
     *
     * @var mixed
     */
    public string $classList = '';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $color = 'primary', public ?string $icon = null)
    {
        $this->classList = match($color) {
            'primary' => 'bg-red-50 border-red-200 text-red-700',
            'warning' => 'bg-yellow-100 border-yellow-300 text-yellow-800',
            'success' => 'bg-green-50 border-green-200 text-green-700',
            'info' => 'bg-blue-50 border-blue-200 text-blue-700',
            'light' => 'bg-neutral-50 border-neutral-200 text-neutral-700'
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.alert');
    }
}
