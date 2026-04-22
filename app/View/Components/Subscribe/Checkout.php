<?php

namespace App\View\Components\Subscribe;

use App\Models\SubscriptionPackage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkout extends Component
{    
    /**
     * package
     *
     * @var mixed
     */
    public $package;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->package = SubscriptionPackage::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.subscribe.checkout');
    }
}
