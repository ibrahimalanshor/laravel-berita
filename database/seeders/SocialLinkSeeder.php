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
        $siteName = Str::slug(setting('name'), '_');

        $socials = [
            'instagram' => "http://instagram.com/$siteName",
            'facebook' => "http://facebook.com/$siteName",
            'twitter' => "http://x.com/$siteName",
            'tiktok' => "http://tiktok.com/$siteName",
            'youtube' => "http://youtube.com/@$siteName"
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
