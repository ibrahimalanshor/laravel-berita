<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            'instagram' => 'http://instagram.com/lararita',
            'facebook' => 'http://facebook.com/lararita',
            'twitter' => 'http://x.com/lararita',
            'tiktok' => 'http://tiktok.com/lararita',
            'youtube' => 'http://youtube.com/@lararita'
        ];

        foreach ($socials as $social => $url) {
            SocialLink::create([
                'type' => $social,
                'name' => Str::ucfirst($social),
                'url' => $url
            ]);
        }
    }
}
