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

    public function handleGoogleCallback()
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

        return redirect()->route('home');
    }
}
