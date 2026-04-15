<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class AuthController extends Controller
{    
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

        $loginActionCheckout = $request->session()->exists('login-action-checkout');

        return route('subscribe.checkout', ['slug' => $loginActionCheckout]);
    }
}
