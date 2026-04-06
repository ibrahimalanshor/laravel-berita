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
        $articles = [
            [
                'title' => 'Godzilla El Nino: Bencana Ekologis dan Ekonomi Nelayan Indonesia',
                'category' => 'News Plus',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/ilustrasi-godzilla-el-nino_01_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Tidak Benar, Natalius Pigai Setujui Yaqut Jadi Tahanan Rumah',
                'category' => 'Periksa Fakta',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/header-periksa-fakta---pigai-menjelaskan-yaqut-korupsi-sesuai-prosedur_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Anomali Ekstrem: Mengapa Harga Emas Anjlok di Tengah Perang Iran',
                'category' => 'Ekonomi',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/antarafoto-harga-emas-tembus-dua-juta-rupiah-1756790454_3341_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'title' => 'Di Balik Penghentian Enkripsi End-to-End pada DM Instagram',
                'category' => 'Byte',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/istock-2167818719_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Menyelipkan Mata-mata di Ban Mobil',
                'category' => 'Gearbox',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => 'articles/istock-1179996623_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'title' => 'Pertamina Bantah Harga Pertamax Naik Jadi Rp17.850 per 1 April',
                'category' => 'Ekonomi',
                'date' => '6 menit lalu',
                'thumbnail' => 'articles/antarafoto-stok-bbm-pontianak-dipastikan-aman-1773239447_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'KPK Tetapkan Direktur Maktour dan Ketum Kesthuri Jadi Tersangka',
                'category' => 'Hukum',
                'date' => '11 menit lalu',
                'thumbnail' => 'articles/1000314193_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Perang AS-Israel vs Iran Hari ke-31, Dampaknya, & Jumlah Korban',
                'category' => 'Politik',
                'date' => '18 menit lalu',
                'thumbnail' => 'articles/konflik-as-israel-dengan-iran-4_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Komnas HAM Sebut Tak Ada Perbedaan Inisial Pelaku Kasus Andrie',
                'category' => 'Hukum',
                'date' => '19 menit lalu',
                'thumbnail' => 'articles/antarafoto-aktivitas-pertambangan-nikel-di-raja-ampat-berpotensi-melanggar-ham-1749802294_1524_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Komitmen Prabowo di Forum Pengusaha RI-Jepang: Lindungi Hutan',
                'category' => 'Bisnis',
                'date' => '23 menit lalu',
                'thumbnail' => 'articles/presiden-prabowo-subianto-pidato-di-forum-bisnis-indonesia-jepang-tyv082.1774877168755_square.jpeg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Kemenhaj Siagakan 45 Klinik Kesehatan Haji di Makkah & Madinah',
                'category' => 'Sosial Budaya',
                'date' => '33 menit lalu',
                'thumbnail' => 'articles/1000332805_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Ketum Gekrafs Geram Jasa Ide Kreatif & Edit Video Tak Dihargai',
                'category' => 'Sosial Budaya',
                'date' => '43 menit lalu',
                'thumbnail' => 'articles/tangkapan-layar-2026-03-30-pukul-19.50.01.1774875953928_square.png',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Apa Itu UNIFIL dan Tugasnya di Lebanon?',
                'category' => 'Politik',
                'date' => '46 menit lalu',
                'thumbnail' => 'articles/antarafoto-pelepasan-satgas-tni-kontingen-garuda-unifil-2025-1744177886_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Kasus RPTKA Kemnaker, 8 Terdakwa Dituntut 4 hingga 9,5 Tahun Bui',
                'category' => 'Hukum',
                'date' => '55 menit lalu',
                'thumbnail' => 'articles/20260330_171436_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'TAUD Duga Ada 16 Aktor Lapangan di Kasus Penyiraman Andrie Yunus',
                'category' => 'Hukum',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/img-20260330-wa0001_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Indonesia-Jepang Teken Kerja Sama Dagang 22,6 Miliar Dolar AS',
                'category' => 'Ekonomi',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/presiden-prabowo-saksikan-kesepakatan-bisnis_002_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Lapor JAKI Dicuekin Setahun, Warga Tebet Lukis Ulang Zebra Cross',
                'category' => 'Sosial Budaya',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/zebra-cross-pac-man-rrtfpc.1774873780189_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Kemenko PM: Kasus Amsal Sitepu Ancaman bagi Industri Kreatif',
                'category' => 'Hukum',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/amsal-sitepu-01_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Kronologi Pelari Lebarun 2026 Meninggal & Pernyataan PP ALTI',
                'category' => 'Sosial Budaya',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/istock-1184450788_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'DPR Usulkan Pemerintah Pertimbangkan Penarikan TNI dari Lebanon',
                'category' => 'Politik',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/dave-laksono_square.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => false
            ],
            [
                'title' => 'Blunder KPK Mengistimewakan Yaqut Cholil Jadi Tahanan Rumah',
                'category' => 'News',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/antarafoto-yaqut-cholil-qoumas-kembali-ke-tahanan-kpk-1774369510_ratio-16x9.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => true
            ],
            [
                'title' => 'Rencana WFA-Belajar Daring: Solusi Cepat atau Ilusi Hemat BBM?',
                'category' => 'Ekonomi',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/antarafoto-pemerintah-berlakukan-wfa-lebaran-2026-1773848415_10947_ratio-16x9.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => true
            ],
            [
                'title' => 'OJK Beri Sanksi Administrasi Bank NEO',
                'category' => 'Ekonomi',
                'date' => '5 jam lalu',
                'thumbnail' => 'articles/pertumbuhan-aset-perbankan-di-ntb-antarafoto_ratio-16x9.jpg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => true
            ],
            [
                'title' => 'Hukum yang Mengintai: Catatan Tubuh Perempuan & KUHP Baru',
                'category' => 'Diajeng',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/ilustrasi-gerakan-tangan-untuk-mengekspresikan-berbagai-perasaan_ratio-16x9.webp',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => true
            ],
            [
                'title' => 'Alasan KPPU Putus Bersalah 97 Pinjol di Kasus Kartel Suku Bunga',
                'category' => 'Ekonomi',
                'date' => '18 jam lalu',
                'thumbnail' => 'articles/kartel-bunga-pinjol-8ae4pg.1774532979172_ratio-16x9.jpeg',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'featured' => true
            ],
        ];

        foreach ($articles as $highlight) {
            $category = ArticleCategory::firstOrCreate(
                ['name' => $highlight['category']],
                ['slug' => Str::slug($highlight['category'])]
            );

            Storage::put($highlight['thumbnail'], file_get_contents(storage_path('app/' . $highlight['thumbnail'])));

            Article::create([
                'title' => $highlight['title'],
                'featured' => $highlight['featured'],
                'slug' => Str::slug($highlight['title']),
                'category_id' => $category->id,
                'published_at' => fake()->dateTimeThisYear(),
                'summary' => $highlight['summary'],
                'thumbnail_url' => Storage::url($highlight['thumbnail'])
            ]);
        }
    }
}
