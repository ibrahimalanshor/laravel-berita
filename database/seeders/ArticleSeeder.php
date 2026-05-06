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
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ArticleCategory::pluck('id');
        $tags = Tag::pluck('id');
        $authors = Author::pluck('id');
        $files = array_values(array_diff(scandir(storage_path('app/articles')), ['.', '..', '.gitignore']));

        collect()
            ->range(0, 49)
            ->each(function ($i) use ($categories, $authors, $tags, $files) {
                $title = fake()->sentence(rand(6, 9));
                $publishedAt = fake()->dateTimeThisYear();

                $article = Article::create([
                    'title' => $title,
                    'featured' => rand(0, 5) === 2,
                    'slug' => Str::slug($title),
                    'category_id' => $categories->random(),
                    'published_at' => null,
                    'thumbnails' => $this->getThumbnails($title, storage_path('app/articles/' . $files[$i])),
                    'thumbnail_caption' => fake()->text(100),
                    'summary' => fake()->text(100),
                    'content' => $this->getContent($publishedAt),
                    'author_id' => $authors->random(),
                    'premium' => rand(0, 5) === 1
                ]);

                $article->tags()->attach($tags->random(3)->toArray());

                $article->update([
                    'published_at' => $publishedAt
                ]);
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

    private function getThumbnails(string $title, string $filePath): array
    {
        $fileName = Str::of($title)->slug('_');

        if (!file_exists(storage_path('app/article_resizes'))) {
            mkdir(storage_path('app/article_resizes'));
        }

        Storage::put('articles/' . $fileName . '.jpg', file_get_contents($filePath));

        $widths = [
            100 => '4x4',
            400 => '16x9',
            800 => '16x9',
            1200 => '16x9'
        ];

        foreach ($widths as $width => $ratio) {
            $resizeFileName = $fileName . '-' . $width . '-' . $ratio . '.jpg';
            $resizePath = storage_path('app/article_resizes/' . $resizeFileName);

            if ($ratio === '4x4') {
                Image::load($filePath)
                    ->fit(Fit::Crop, $width, $width)
                    ->optimize()
                    ->save($resizePath);
            } else {
                Image::load($filePath)
                    ->fit(Fit::Crop, $width, (int) round($width * 9 / 16))
                    ->optimize()
                    ->save($resizePath);
            }

            Storage::put('articles/' . $resizeFileName, file_get_contents($resizePath));

            unlink($resizePath);
        }

        return collect($widths)
            ->map(function ($ratio, $width) use ($fileName) {
                $resizeFileName = $fileName . '-' . $width . '-' . $ratio . '.jpg';

                return [
                    'ratio' => $ratio,
                    'width' => $width,
                    'file_url' => Storage::url('articles/' . $resizeFileName)
                ];
            })
            ->groupBy('ratio')
            ->map(function ($items) {
                return $items->mapWithKeys(fn ($item) => [$item['width'] => $item['file_url']]);
            })
            ->union(['original' => Storage::url('articles/' . $fileName . '.jpg')])
            ->toArray();
    }
}
