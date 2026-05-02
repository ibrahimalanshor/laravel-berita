<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ArticleCategory::pluck('id');
        $tags = Tag::pluck('id')->toArray();
        $authors = Author::pluck('id');
        $files = array_values(array_diff(scandir(storage_path('app/articles')), ['.', '..', '.gitignore']));

        collect()
            ->range(0, 49)
            ->each(function ($i) use ($categories, $authors, $tags, $files) {
                Storage::put('articles/' . $files[$i], file_get_contents(storage_path('app/articles/' . $files[$i])));

                $title = fake()->sentence(rand(6, 9));
                $publishedAt = fake()->dateTimeThisYear();

                $article = Article::create([
                    'title' => $title,
                    'featured' => rand(0, 5) === 2,
                    'slug' => Str::slug($title),
                    'category_id' => $categories->random(),
                    'published_at' => $publishedAt,
                    'thumbnail_url' => Storage::url('articles/' . $files[$i]),
                    'thumbnail_caption' => fake()->paragraph(),
                    'summary' => fake()->paragraph(),
                    'content' => $this->getContent($publishedAt),
                    'author_id' => $authors->random(),
                    'premium' => rand(0, 5) === 1
                ]);

                $article->tags()->attach($tags);
            });

        ArticleCategory::has('articles', '>=', 5)
            ->inRandomOrder()
            ->limit(3)
            ->update([
                'featured' => true
            ]);
    }

    private function getContent($date) : string
    {
        $app_url = config('app.url');
        $app_name = setting('name');

        $start = fake()->text();
        $date = Carbon::parse($date)->format('l (d/M/Y)');
        $body = collect(fake()->paragraphs(10))
            ->map(fn ($text) => "<p>$text</p>")
            ->join(PHP_EOL);

        return <<<EOD
<p>
    <a href="$app_url">$app_name</a> - $start, $date.
</p>
$body
EOD;
    }
}
