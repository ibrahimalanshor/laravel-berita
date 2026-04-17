<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

        return view('profile.index', [
            'user' => $request->user(),
            'current_route' => $currentRoute,
            'title' => 'Profil Saya - Lararita',
            'description' => 'Detail informasi akun dan form edit profil pengguna'
        ]);
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

        return view('profile.bookmark', [
            'title' => 'Baca Nanti - Lararita',
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

        return view('profile.favourite', [
            'title' => 'Artikel Favorit - Lararita',
            'description' => 'Daftar berita yang disimpan sebagai favorit',
            'user' => $request->user(),
            'current_route' => $currentRoute,
            'favouriteCount' => $favouriteCount,
            'favourites' => $favourites
        ]);
    }
}
