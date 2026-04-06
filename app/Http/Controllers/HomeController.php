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

        $flash = Article::latest('published_at')
            ->take(15)
            ->with('category')
            ->get();

        $editors = Article::latest('published_at')
            ->take(5)
            ->with('category')
            ->where('featured', true)
            ->get();

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
