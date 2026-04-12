<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'Supriyanto',
            'Dewi Sartika',
            'Budi Santoso',
            'Siti Aminah',
            'Ahmad Fauzi',
            'Rina Wijaya',
            'Hendra Gunawan',
            'Lina Marlina',
            'Agus Prasetyo',
            'Yulia Sari'
        ];

        $hasImage = collect($authors)->random();

        foreach ($authors as $author) {
            if ($hasImage === $author) {
                $image = 'authors/image.jpg';
                Storage::put($image, file_get_contents(storage_path('app/' . $image)));
                $imageUrl = Storage::url($image);
            }

            $about = collect()
                ->range(0, 8)
                ->map(fn () => '<p>' . fake()->paragraph() . '</p>')
                ->join(PHP_EOL);
            
            Author::create([
                'name' => $author,
                'slug' => Str::slug($author),
                'image_url' => isset($imageUrl) ? $imageUrl : null,
                'about' => $about,
                'instagram_url' => 'http://instagram.com',
                'facebook_url' => 'http://facebook.com',
                'twitter_url' => 'http://x.com',
                'tiktok_url' => 'http://tiktok.com',
                'youtube_url' => 'http://youtube.com',
                'email' => fake()->email()
            ]);
        }
    }
}
