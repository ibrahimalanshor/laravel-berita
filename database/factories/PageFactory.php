<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(2, false);

        $content = collect(fake()->paragraphs(10))
            ->map(fn ($text) => "<p>$text</p>")
            ->join(PHP_EOL);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $content
        ];
    }
}
