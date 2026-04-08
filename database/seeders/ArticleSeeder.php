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
                'thumbnail' => 'articles/ilustrasi-godzilla-el-nino_01_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Tidak Benar, Natalius Pigai Setujui Yaqut Jadi Tahanan Rumah',
                'category' => 'Periksa Fakta',
                'thumbnail' => 'articles/header-periksa-fakta---pigai-menjelaskan-yaqut-korupsi-sesuai-prosedur_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Anomali Ekstrem: Mengapa Harga Emas Anjlok di Tengah Perang Iran',
                'category' => 'Ekonomi',
                'thumbnail' => 'articles/antarafoto-harga-emas-tembus-dua-juta-rupiah-1756790454_3341_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'title' => 'Di Balik Penghentian Enkripsi End-to-End pada DM Instagram',
                'category' => 'Byte',
                'thumbnail' => 'articles/istock-2167818719_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'title' => 'Menyelipkan Mata-mata di Ban Mobil',
                'category' => 'Gearbox',
                'thumbnail' => 'articles/istock-1179996623_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'title' => 'Pertamina Bantah Harga Pertamax Naik Jadi Rp17.850 per 1 April',
                'category' => 'Ekonomi',
                'date' => '6 menit lalu',
                'thumbnail' => 'articles/antarafoto-stok-bbm-pontianak-dipastikan-aman-1773239447_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'KPK Tetapkan Direktur Maktour dan Ketum Kesthuri Jadi Tersangka',
                'category' => 'Hukum',
                'date' => '11 menit lalu',
                'thumbnail' => 'articles/1000314193_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Perang AS-Israel vs Iran Hari ke-31, Dampaknya, & Jumlah Korban',
                'category' => 'Politik',
                'date' => '18 menit lalu',
                'thumbnail' => 'articles/konflik-as-israel-dengan-iran-4_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Komnas HAM Sebut Tak Ada Perbedaan Inisial Pelaku Kasus Andrie',
                'category' => 'Hukum',
                'date' => '19 menit lalu',
                'thumbnail' => 'articles/antarafoto-aktivitas-pertambangan-nikel-di-raja-ampat-berpotensi-melanggar-ham-1749802294_1524_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Komitmen Prabowo di Forum Pengusaha RI-Jepang: Lindungi Hutan',
                'category' => 'Bisnis',
                'date' => '23 menit lalu',
                'thumbnail' => 'articles/presiden-prabowo-subianto-pidato-di-forum-bisnis-indonesia-jepang-tyv082.1774877168755_square.jpeg',
                'featured' => false
            ],
            [
                'title' => 'Kemenhaj Siagakan 45 Klinik Kesehatan Haji di Makkah & Madinah',
                'category' => 'Sosial Budaya',
                'date' => '33 menit lalu',
                'thumbnail' => 'articles/1000332805_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Ketum Gekrafs Geram Jasa Ide Kreatif & Edit Video Tak Dihargai',
                'category' => 'Sosial Budaya',
                'date' => '43 menit lalu',
                'thumbnail' => 'articles/tangkapan-layar-2026-03-30-pukul-19.50.01.1774875953928_square.png',
                'featured' => false
            ],
            [
                'title' => 'Apa Itu UNIFIL dan Tugasnya di Lebanon?',
                'category' => 'Politik',
                'date' => '46 menit lalu',
                'thumbnail' => 'articles/antarafoto-pelepasan-satgas-tni-kontingen-garuda-unifil-2025-1744177886_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Kasus RPTKA Kemnaker, 8 Terdakwa Dituntut 4 hingga 9,5 Tahun Bui',
                'category' => 'Hukum',
                'date' => '55 menit lalu',
                'thumbnail' => 'articles/20260330_171436_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'TAUD Duga Ada 16 Aktor Lapangan di Kasus Penyiraman Andrie Yunus',
                'category' => 'Hukum',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/img-20260330-wa0001_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Indonesia-Jepang Teken Kerja Sama Dagang 22,6 Miliar Dolar AS',
                'category' => 'Ekonomi',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/presiden-prabowo-saksikan-kesepakatan-bisnis_002_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Lapor JAKI Dicuekin Setahun, Warga Tebet Lukis Ulang Zebra Cross',
                'category' => 'Sosial Budaya',
                'date' => '1 jam lalu',
                'thumbnail' => 'articles/zebra-cross-pac-man-rrtfpc.1774873780189_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Kemenko PM: Kasus Amsal Sitepu Ancaman bagi Industri Kreatif',
                'category' => 'Hukum',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/amsal-sitepu-01_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Kronologi Pelari Lebarun 2026 Meninggal & Pernyataan PP ALTI',
                'category' => 'Sosial Budaya',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/istock-1184450788_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'DPR Usulkan Pemerintah Pertimbangkan Penarikan TNI dari Lebanon',
                'category' => 'Politik',
                'date' => '2 jam lalu',
                'thumbnail' => 'articles/dave-laksono_square.jpg',
                'featured' => false
            ],
            [
                'title' => 'Blunder KPK Mengistimewakan Yaqut Cholil Jadi Tahanan Rumah',
                'category' => 'News',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/antarafoto-yaqut-cholil-qoumas-kembali-ke-tahanan-kpk-1774369510_ratio-16x9.jpg',
                'featured' => true
            ],
            [
                'title' => 'Rencana WFA-Belajar Daring: Solusi Cepat atau Ilusi Hemat BBM?',
                'category' => 'Ekonomi',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/antarafoto-pemerintah-berlakukan-wfa-lebaran-2026-1773848415_10947_ratio-16x9.jpg',
                'featured' => true
            ],
            [
                'title' => 'OJK Beri Sanksi Administrasi Bank NEO',
                'category' => 'Ekonomi',
                'date' => '5 jam lalu',
                'thumbnail' => 'articles/pertumbuhan-aset-perbankan-di-ntb-antarafoto_ratio-16x9.jpg',
                'featured' => true
            ],
            [
                'title' => 'Hukum yang Mengintai: Catatan Tubuh Perempuan & KUHP Baru',
                'category' => 'Diajeng',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => 'articles/ilustrasi-gerakan-tangan-untuk-mengekspresikan-berbagai-perasaan_ratio-16x9.webp',
                'featured' => true
            ],
            [
                'title' => 'Alasan KPPU Putus Bersalah 97 Pinjol di Kasus Kartel Suku Bunga',
                'category' => 'Ekonomi',
                'date' => '18 jam lalu',
                'thumbnail' => 'articles/kartel-bunga-pinjol-8ae4pg.1774532979172_ratio-16x9.jpeg',
                'featured' => true
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Jumat, 13 Mar',
                'title' => 'Made Like A Gun: Tak Sekadar Slogan, Inilah DNA Royal Enfield',
                'thumbnail' => 'articles/istock-1288603585_020_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Rabu, 11 Mar',
                'title' => 'Legenda Suzuki Truntung Bermula dari Kebun Cengkih di Manado',
                'thumbnail' => 'articles/suzuki-truntung-1_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Jumat, 06 Mar',
                'title' => 'Kisah Yamaha RX-King, Sang Raja Ngebut yang Menggelegar',
                'thumbnail' => 'articles/motor-rx-king-istockphoto_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Kamis, 05 Mar',
                'title' => 'Opel Blazer di Indonesia: Cepat Bersinar, Cepat Pula Meredup',
                'thumbnail' => 'articles/opel-blazer-_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Selasa, 24 Mar',
                'title' => 'Masuk Sekolah Setelah Lebaran 2026 Kapan & Mulai Tanggal Berapa?',
                'thumbnail' => 'articles/istock-1061085192_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Selasa, 06 Des',
                'title' => 'Jalur Migrasi Deutro Melayu dan Persebarannya di Indonesia',
                'thumbnail' => 'articles/peta-indonesia-dan-malaysia-istock--2_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Senin, 31 Mar',
                'title' => 'Hikmah Halal Bihalal dan Dalilnya dalam Islam',
                'thumbnail' => 'articles/halal-bihalal-lebaran--3_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Panduan Lengkap & Tata Cara Daftar KIP Kuliah Jalur SNBT 2026',
                'thumbnail' => 'articles/ilustrasi-kip-kuliah-2_ratio-16x9.webp',
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Mengenal Mosaic Defence dan Strategi Iran Melawan AS-Israel',
                'thumbnail' => 'articles/tehran-itockphoto-3_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => '8 jam lalu',
                'title' => 'Mengintip Vivo X300 Ultra, Ini Spesifikasi & Perkiraan Harganya',
                'thumbnail' => 'articles/vivo-x300-ultra_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Mengenal Tap to Pay Apple, Saat iPhone Bisa Jadi Alat Pembayaran',
                'thumbnail' => 'articles/apple_apple-pay_transaction_big.jpg.large-copy_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Jumat, 13 Mar',
                'title' => 'Upaya Meta Melawan Penipuan dan Melindungi Pengguna',
                'thumbnail' => 'articles/ilustrasi-penipuan-digital-fgoahj.1773384854029_ratio-16x9.jpg',
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Kamis, 02 Jan',
                'title' => 'Mengapa Banyak Hacker Berasal dari Rusia?',
                'thumbnail' => 'articles/deface-istock2_ratio-16x9.jpeg',
                'featured' => false
            ]
        ];

        $content = $this->getContent();

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
                'thumbnail_url' => Storage::url($highlight['thumbnail']),
                'thumbnail_caption' => 'Menteri HAM Natalius Pigai menyampaikan paparan saat rapat kerja bersama Komisi XIII DPR di Kompleks Parlemen, Senayan, Jakarta, Selasa (7/4/2026). ANTARA FOTO/Rivan Awal Lingga/sgd',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'content' => $content
            ]);
        }

        ArticleCategory::has('articles', '>=', 5)
            ->inRandomOrder()
            ->limit(3)
            ->update([
                'featured' => true
            ]);
    }

    private function getContent() : string
    {
        return <<<EOD
<p>
    <a href="https://tirto.id">tirto.id</a> - Menteri Hak Asasi Manusia (HAM) Natalius Pigai menjelaskan ihwal persoalan mutasi pegawainya Ernie Nurheyanti M Toelle usai digugat ke Pengadilan Tata Usaha Negara (PTUN) dalam rapat kerja dengan Komisi XIII DPR di Kompleks Parlemen, Senayan, Jakarta Pusat, Selasa (7/4/2026).
</p>
<p>
    Pigai menegaskan seluruh keputusan terkait pergeseran jabatan dilakukan secara profesional dan berbasis kinerja. Selama menjabat sebagai Menteri, dia mengaku juga tidak pernah melakukan penonaktifan (nonjob) terhadap pegawai atau pejabat di kementeriannya.
</p>
<p>
    “Jadi, dengan pernyataan saya di parlemen ini bahwa saya menteri yang tidak pernah nonjobkan pegawai, artinya kalau saya geserkan orang, berarti ukuran profesional,” kata Pigai dalam rapat.
</p>
<p>
    Pigai menjelaskan, seluruh pejabat yang diangkatnya berasal dari proses seleksi berbasis rekam jejak dan kompetensi, tanpa adanya kedekatan personal.
</p>
<p>
    Menurutnya, evaluasi kinerja menjadi dasar utama dalam setiap keputusan mutasi. Salah satu indikator yang disorot adalah capaian serapan anggaran dan ada satu unit kerja dengan serapan anggaran paling rendah yakni sekitar 89 persen.</p><p>“Akhirnya saya kumpulkan semua pejabat. Yang serapan rendah, copot ya? Setuju enggak?,” kata dia.</p><p>Selain itu, proses mutasi dilakukan secara terbuka dan telah disampaikan kepada para pejabat terkait sebelum mengambil keputusan. Terlebih lagi, pejabat tersebut awalnya ditawari posisi sebagai Kepala Kantor Wilayah di Sumatera Utara namun menolak.
</p>
<p>
    “Dia milih sendiri jadi jabatan fungsional. Itu pun tidak turun, geser di tempat sama,” katanya.
</p>
<p>
    Namun, setelah keputusan tersebut berjalan, pegawai yang bersangkutan tetap mengajukan gugatan ke PTUN. Bahkan mengaku sempat menawarkan bantuan pribadi untuk membiayai pengacara bagi pegawai tersebut.
</p>
<p>
    “Sekarang, saat ini sedang dalam proses peradilan. Kita lihat hasil pengadilannya seperti apa,” katanya.
</p>
EOD;
    }
}
