<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $about = collect()
            ->range(0, 8)
            ->map(fn () => '<p>' . fake()->paragraph() . '</p>')
            ->join(PHP_EOL);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image_url' => rand(0, 5) === 2 ? Storage::url('authors/image.jpg') : null,
            'about' => $about,
            'instagram_url' => 'http://instagram.com/' . Str::slug($name, '_'),
            'facebook_url' => 'http://facebook.com/' . Str::slug($name, '_'),
            'twitter_url' => 'http://x.com/' . Str::slug($name, '_'),
            'tiktok_url' => 'http://tiktok.com/' . Str::slug($name, '_'),
            'youtube_url' => 'http://youtube.com/' . Str::slug($name, '_'),
            'email' => fake()->email()
        ];
    }
}
