<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $highlights = Article::inRandomOrder()
            ->take(5)
            ->with('category')
            ->get();

        $flash = [
            [
                'title' => 'Pertamina Bantah Harga Pertamax Naik Jadi Rp17.850 per 1 April',
                'category' => 'Ekonomi',
                'date' => '6 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/11/antarafoto-stok-bbm-pontianak-dipastikan-aman-1773239447_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'KPK Tetapkan Direktur Maktour dan Ketum Kesthuri Jadi Tersangka',
                'category' => 'Hukum',
                'date' => '11 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/1000314193_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Perang AS-Israel vs Iran Hari ke-31, Dampaknya, & Jumlah Korban',
                'category' => 'Politik',
                'date' => '18 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/14/konflik-as-israel-dengan-iran-4_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Komnas HAM Sebut Tak Ada Perbedaan Inisial Pelaku Kasus Andrie',
                'category' => 'Hukum',
                'date' => '19 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2025/06/13/antarafoto-aktivitas-pertambangan-nikel-di-raja-ampat-berpotensi-melanggar-ham-1749802294_1524_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Komitmen Prabowo di Forum Pengusaha RI-Jepang: Lindungi Hutan',
                'category' => 'Bisnis',
                'date' => '23 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/presiden-prabowo-subianto-pidato-di-forum-bisnis-indonesia-jepang-tyv082.1774877168755_square.jpeg')),
                'featured' => false
            ],
            [
                'title' => 'Kemenhaj Siagakan 45 Klinik Kesehatan Haji di Makkah & Madinah',
                'category' => 'Sosial Budaya',
                'date' => '33 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/01/14/1000332805_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Ketum Gekrafs Geram Jasa Ide Kreatif & Edit Video Tak Dihargai',
                'category' => 'Sosial Budaya',
                'date' => '43 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/tangkapan-layar-2026-03-30-pukul-19.50.01.1774875953928_square.png')),
                'featured' => false
            ],
            [
                'title' => 'Apa Itu UNIFIL dan Tugasnya di Lebanon?',
                'category' => 'Politik',
                'date' => '46 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2025/04/09/antarafoto-pelepasan-satgas-tni-kontingen-garuda-unifil-2025-1744177886_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Kasus RPTKA Kemnaker, 8 Terdakwa Dituntut 4 hingga 9,5 Tahun Bui',
                'category' => 'Hukum',
                'date' => '55 menit lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/20260330_171436_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'TAUD Duga Ada 16 Aktor Lapangan di Kasus Penyiraman Andrie Yunus',
                'category' => 'Hukum',
                'date' => '1 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/img-20260330-wa0001_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Indonesia-Jepang Teken Kerja Sama Dagang 22,6 Miliar Dolar AS',
                'category' => 'Ekonomi',
                'date' => '1 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/presiden-prabowo-saksikan-kesepakatan-bisnis_002_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Lapor JAKI Dicuekin Setahun, Warga Tebet Lukis Ulang Zebra Cross',
                'category' => 'Sosial Budaya',
                'date' => '1 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/zebra-cross-pac-man-rrtfpc.1774873780189_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Kemenko PM: Kasus Amsal Sitepu Ancaman bagi Industri Kreatif',
                'category' => 'Hukum',
                'date' => '2 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/amsal-sitepu-01_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'Kronologi Pelari Lebarun 2026 Meninggal & Pernyataan PP ALTI',
                'category' => 'Sosial Budaya',
                'date' => '2 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2026/03/30/istock-1184450788_square.jpg')),
                'featured' => false
            ],
            [
                'title' => 'DPR Usulkan Pemerintah Pertimbangkan Penarikan TNI dari Lebanon',
                'category' => 'Politik',
                'date' => '2 jam lalu',
                'thumbnail' => asset('/articles/' . basename('https://mmc.tirto.id/image/otf/144x0/2025/11/10/dave-laksono_square.jpg')),
                'featured' => false
            ],
        ];

        $editors = [
            [
                'title' => 'Blunder KPK Mengistimewakan Yaqut Cholil Jadi Tahanan Rumah',
                'category' => 'News',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/antarafoto-yaqut-cholil-qoumas-kembali-ke-tahanan-kpk-1774369510_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'title' => 'Rencana WFA-Belajar Daring: Solusi Cepat atau Ilusi Hemat BBM?',
                'category' => 'Ekonomi',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/antarafoto-pemerintah-berlakukan-wfa-lebaran-2026-1773848415_10947_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'title' => 'OJK Beri Sanksi Administrasi Bank NEO',
                'category' => 'Ekonomi',
                'date' => '5 jam lalu',
                'thumbnail' => asset('articles/pertumbuhan-aset-perbankan-di-ntb-antarafoto_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'title' => 'Hukum yang Mengintai: Catatan Tubuh Perempuan & KUHP Baru',
                'category' => 'Diajeng',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/ilustrasi-gerakan-tangan-untuk-mengekspresikan-berbagai-perasaan_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'title' => 'Alasan KPPU Putus Bersalah 97 Pinjol di Kasus Kartel Suku Bunga',
                'category' => 'Ekonomi',
                'date' => '18 jam lalu',
                'thumbnail' => asset('articles/kartel-bunga-pinjol-8ae4pg.1774532979172_ratio-16x9.jpeg'),
                'featured' => false
            ],
        ];

        $otomotif = collect([
            [
                'category' => 'Otomotif',
                'date' => 'Jumat, 13 Mar',
                'title' => 'Made Like A Gun: Tak Sekadar Slogan, Inilah DNA Royal Enfield',
                'thumbnail' => asset('articles/istock-1288603585_020_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Kamis, 12 Mar',
                'title' => 'Menyelipkan Mata-mata di Ban Mobil',
                'thumbnail' => asset('articles/istock-1179996623_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Rabu, 11 Mar',
                'title' => 'Legenda Suzuki Truntung Bermula dari Kebun Cengkih di Manado',
                'thumbnail' => asset('articles/suzuki-truntung-1_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Jumat, 06 Mar',
                'title' => 'Kisah Yamaha RX-King, Sang Raja Ngebut yang Menggelegar',
                'thumbnail' => asset('articles/motor-rx-king-istockphoto_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'category' => 'Otomotif',
                'date' => 'Kamis, 05 Mar',
                'title' => 'Opel Blazer di Indonesia: Cepat Bersinar, Cepat Pula Meredup',
                'thumbnail' => asset('articles/opel-blazer-_ratio-16x9.webp'),
                'featured' => false
            ]
        ]);

        $pendidikan = collect([
            [
                'category' => 'Pendidikan',
                'date' => 'Selasa, 24 Mar',
                'title' => 'Masuk Sekolah Setelah Lebaran 2026 Kapan & Mulai Tanggal Berapa?',
                'thumbnail' => asset('articles/istock-1061085192_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Selasa, 06 Des',
                'title' => 'Jalur Migrasi Deutro Melayu dan Persebarannya di Indonesia',
                'thumbnail' => asset('articles/peta-indonesia-dan-malaysia-istock--2_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Senin, 31 Mar',
                'title' => 'Hikmah Halal Bihalal dan Dalilnya dalam Islam',
                'thumbnail' => asset('articles/halal-bihalal-lebaran--3_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Panduan Lengkap & Tata Cara Daftar KIP Kuliah Jalur SNBT 2026',
                'thumbnail' => asset('articles/ilustrasi-kip-kuliah-2_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'category' => 'Pendidikan',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Mengenal Mosaic Defence dan Strategi Iran Melawan AS-Israel',
                'thumbnail' => asset('articles/tehran-itockphoto-3_ratio-16x9.jpg'),
                'featured' => false
            ]
        ]);

        $teknologi = collect([
            [
                'category' => 'Teknologi',
                'date' => '8 jam lalu',
                'title' => 'Mengintip Vivo X300 Ultra, Ini Spesifikasi & Perkiraan Harganya',
                'thumbnail' => asset('articles/vivo-x300-ultra_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Mengenal Tap to Pay Apple, Saat iPhone Bisa Jadi Alat Pembayaran',
                'thumbnail' => asset('articles/apple_apple-pay_transaction_big.jpg.large-copy_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Kamis, 26 Mar',
                'title' => 'Di Balik Penghentian Enkripsi End-to-End pada DM Instagram',
                'thumbnail' => asset('articles/istock-2167818719_ratio-16x9 (1).jpg'),
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Jumat, 13 Mar',
                'title' => 'Upaya Meta Melawan Penipuan dan Melindungi Pengguna',
                'thumbnail' => asset('articles/ilustrasi-penipuan-digital-fgoahj.1773384854029_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'category' => 'Teknologi',
                'date' => 'Kamis, 02 Jan',
                'title' => 'Mengapa Banyak Hacker Berasal dari Rusia?',
                'thumbnail' => asset('articles/deface-istock2_ratio-16x9.jpeg'),
                'featured' => false
            ]
        ]);

        return view('index', [
            'title' => 'Lararita - Berita Terkini, Trending dan Terpercaya',
            'highlights' => $highlights,
            'flash' => $flash,
            'editors' => $editors,
            'otomotif' => $otomotif,
            'pendidikan' => $pendidikan,
            'teknologi' => $teknologi
        ]);
    }

}
