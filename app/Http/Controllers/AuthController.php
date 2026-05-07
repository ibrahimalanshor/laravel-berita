<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class AuthController extends Controller
{  
    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $intended = $request->session()->get('url.intended');
        $intentedToCheckout = $intended && Str::contains($intended, 'subscribe');
        
        $siteName = setting('name');

        return view('login', [
            'title' => "Masuk atau Daftar - $siteName",
            'description' => "Masuk ke akun Anda untuk mendapatkan pengalaman terbaik dalam membaca berita di $siteName",
            'intentedToCheckout' => $intentedToCheckout
        ]);
    }
    
    /**
     * redirectToGoogle
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    /**
     * handleGoogleCallback
     *
     * @param  mixed $request
     * @return void
     */
    public function handleGoogleCallback(Request $request, AuthService $authService)
    {
        $authService->loginFromCallback(Socialite::driver('google')->user());

        if (!$request->session()->exists('login-action-checkout')) {
            return redirect()->route('home');
        }

        return redirect()->intended(route('home'));
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
