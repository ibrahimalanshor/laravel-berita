<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $highlights = [
            [
                'title' => 'Godzilla El Nino: Bencana Ekologis dan Ekonomi Nelayan Indonesia',
                'category' => 'News Plus',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/ilustrasi-godzilla-el-nino_01_ratio-16x9.jpg',
            ],
            [
                'title' => 'Tidak Benar, Natalius Pigai Setujui Yaqut Jadi Tahanan Rumah',
                'category' => 'Periksa Fakta',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/header-periksa-fakta---pigai-menjelaskan-yaqut-korupsi-sesuai-prosedur_ratio-16x9.jpg',
            ],
            [
                'title' => 'Anomali Ekstrem: Mengapa Harga Emas Anjlok di Tengah Perang Iran',
                'category' => 'Ekonomi',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/antarafoto-harga-emas-tembus-dua-juta-rupiah-1756790454_3341_ratio-16x9.webp',
            ],
            [
                'title' => 'Di Balik Penghentian Enkripsi End-to-End pada DM Instagram',
                'category' => 'Byte',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/istock-2167818719_ratio-16x9.jpg',
            ],
            [
                'title' => 'Menyelipkan Mata-mata di Ban Mobil',
                'category' => 'Gearbox',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/istock-1179996623_ratio-16x9.webp',
            ]
        ];

        foreach ($highlights as $highlight) {
            $category = ArticleCategory::firstOrCreate(
                ['name' => $highlight['category']],
                ['slug' => Str::slug($highlight['category'])]
            );

            Storage::put($highlight['thumbnail'], file_get_contents(storage_path('app/' . $highlight['thumbnail'])));

            Article::create([
                'title' => $highlight['title'],
                'slug' => Str::slug($highlight['title']),
                'category_id' => $category->id,
                'published_at' => fake()->dateTimeThisYear(),
                'summary' => $highlight['summary'],
                'thumbnail_url' => Storage::url($highlight['thumbnail'])
            ]);
        }
    }
}
