<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{  
    /**
     * view
     *
     * @param  mixed $request
     * @return void
     */
    public function view(Request $request)
    {
        $currentRoute = Route::currentRouteName();

        $siteName = setting('name');

        return view('home.profile.index', [
            'user' => $request->user(),
            'current_route' => $currentRoute,
            'title' => "Profil Saya - $siteName",
            'description' => 'Detail informasi akun dan form edit profil pengguna'
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(UpdateRequest $request)
    {
        $user = $request->user();

        $newAvatarUrl = null;

        if ($request->file('avatar')) {
            $filePath = $request->file('avatar')
                ->store(config('auth.avatar_dir'));
            $newAvatarUrl = Storage::url($filePath);
        }

        $user->update(array_merge(
            ['name' => $request->input('name')],
            $request->input('password') ? ['password' => $request->input('password')] : [],
            $newAvatarUrl ? ['avatar_url' => $newAvatarUrl] : []
        ));

        return back()->with('message', 'Profil berhasil diperbarui');
    }

    /**
     * bookmark
     *
     * @param  mixed $request
     * @return void
     */
    public function bookmark(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $bookmarksCount = $request->user()
            ->bookmarks()
            ->wherePivot('type', 'bookmark')
            ->count();
        $bookmarks = $request->user()
            ->bookmarks()
            ->wherePivot('type', 'bookmark')
            ->paginate(10);

        $siteName = setting('name');

        return view('home.profile.bookmark', [
            'title' => "Baca Nanti - $siteName",
            'description' => 'Daftar berita yang disimpan untuk dibaca nanti',
            'user' => $request->user(),
            'current_route' => $currentRoute,
            'bookmarksCount' => $bookmarksCount,
            'bookmarks' => $bookmarks
        ]);
    }

    /**
     * favourite
     *
     * @param  mixed $request
     * @return void
     */
    public function favourite(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $favouriteCount = $request->user()
            ->bookmarks()
            ->wherePivot('type', 'favorite')
            ->count();
        $favourites = $request->user()
            ->bookmarks()
            ->wherePivot('type', 'favorite')
            ->paginate(10);

        $siteName = setting('name');

        return view('home.profile.favourite', [
            'title' => "Artikel Favorit - $siteName",
            'description' => 'Daftar berita yang disimpan sebagai favorit',
            'user' => $request->user(),
            'current_route' => $currentRoute,
            'favouriteCount' => $favouriteCount,
            'favourites' => $favourites
        ]);
    }

    /**
     * subscription
     *
     * @param  mixed $request
     * @return void
     */
    public function subscription(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $subscriptions = $request->user()
            ->subscriptions()
            ->latest('created_at')
            ->get();

        $siteName = setting('name');

        return view('home.profile.subscription', [
            'title' => "Status Langganan - $siteName",
            'description' => 'Status langganan yang aktif',
            'user' => $request->user(),
            'subscriptions' => $subscriptions,
            'current_route' => $currentRoute
        ]);
    }

    /**
     * notification
     *
     * @param  mixed $request
     * @return void
     */
    public function notification(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $notifications = $request->user()
            ->notifications()
            ->unread()
            ->paginate(10);

        $siteName = setting('name');

        return view('home.profile.notification', [
            'title' => "Status Langganan - $siteName",
            'description' => 'Status langganan yang aktif',
            'user' => $request->user(),
            'notifications' => $notifications,
            'current_route' => $currentRoute
        ]);
    }
}
