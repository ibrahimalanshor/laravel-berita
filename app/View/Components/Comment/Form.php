<?php

namespace App\View\Components\Comment;

use App\Models\Comment;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * user
     *
     * @var mixed
     */
    public ?User $user;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $type = 'create', public ?Comment $reply, public string $article)
    {
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment.form');
    }
}
