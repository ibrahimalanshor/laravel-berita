<?php

namespace App\View\Components\Includes;

use App\Models\Menu;
use App\Models\Subscription;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navbar extends Component
{    
    /**
     * menus
     *
     * @var mixed
     */
    public $menus;

    /**
     * tags
     *
     * @var mixed
     */
    public $tags;
    
    /**
     * displayTag
     *
     * @var mixed
     */
    public bool $displayTag;
    
    /**
     * userMenus
     *
     * @var array
     */
    public $userMenus = [];
    
    /**
     * subscription
     *
     * @var mixed
     */
    public ?Subscription $subscription;
    
    /**
     * notificationCount
     *
     * @var mixed
     */
    public int $notificationCount = 0;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('type', 'navbar')
            ->take(4)
            ->get();

        $this->userMenus = [
            'Profil' => route('profile.index'),
            'Notifikasi' => route('profile.notification'),
            'Baca Nanti' => route('profile.bookmark'),
            'Artikel Favorit' => route('profile.favourite'),
            'Logout' => route('profile.favourite')
        ];

        $this->displayTag = Route::currentRouteName() === 'home';

        if ($this->displayTag) {
            $this->tags = Tag::orderBy('trending_score', 'desc')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        }

        $this->setSubscribed();
        $this->setNotificationCount();
    }

    private function setSubscribed()
    {
        if (!Auth::check()) {
            $this->subscription = null;
            return;
        }

        $user = Auth::user();

        $this->subscription = $user->subscription;
    }

    private function setNotificationCount()
    {
        if (!Auth::check()) {
            $this->notificationCount = 0;

            return;
        }

        $user = Auth::user();

        $this->notificationCount = $user->unreadNotifications
            ->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.navbar');
    }
}
