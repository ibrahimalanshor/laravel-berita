<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $intentedToCheckout = $intended && Str::contains($intended, 'checkout');

        return view('login', [
            'title' => 'Masuk atau Daftar - Lararita',
            'description' => 'Masuk ke akun Anda untuk mendapatkan pengalaman terbaik dalam membaca berita di Lararita',
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
    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            [
                'google_id' => $googleUser->id
            ],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'email_verified_at' => now(),
            ]
        );
        
        Auth::login($user);

        if (!$request->session()->exists('login-action-checkout')) {
            return redirect()->route('home');
        }

        return redirect()->intended(route('home'));
    }
}
