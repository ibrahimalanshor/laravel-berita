<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialUser;

class AuthService
{    
    /**
     * loginFromCallback
     *
     * @param  mixed $socialUser
     * @return void
     */
    public function loginFromCallback(SocialUser $socialUser): void
    {
        $user = User::firstWhere('google_id', $socialUser->id);

        if (!$user) {
            $avatar = !$socialUser->getAvatar() ? null : $this->downloadSocialAvatar($socialUser);

            $user = User::create([
                'google_id' => $socialUser->id,
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'email_verified_at' => now(),
                'avatar_url' => $avatar
            ]);
        }
        
        Auth::login($user);
    }
    
    /**
     * downloadSocialAvatar
     *
     * @param  mixed $socialUser
     * @return string
     */
    private function downloadSocialAvatar(SocialUser $socialUser): ?string
    {
        try {
            $tempAvatarFilePath = storage_path('app/' . basename($socialUser->getAvatar()));

            $res = Http::sink($tempAvatarFilePath)
                ->get($socialUser->getAvatar());

            if (!$res->successful()) {
                return null;
            }

            $fileName = 'users/' . Str::random() . '.png';
            
            Storage::put($fileName, file_get_contents($tempAvatarFilePath));

            return Storage::url($fileName);
        } catch (Exception $e) {
            return null;
        }
    }
}
