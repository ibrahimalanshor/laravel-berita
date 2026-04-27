<?php

namespace App\View\Components\Comment;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Single extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Comment $comment, public Collection $reactions)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment.single');
    }
}
