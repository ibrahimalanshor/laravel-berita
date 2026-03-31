<?php

use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    #[Computed]
    public function articles()
    {
        return [
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
    }
};
?>

<section {{ $attributes->class('border-t border-neutral-300 py-3 md:border-neutral-900 lg:border-0') }}>
    <livewire:base::container class="space-y-2 lg:space-y-4">
        <h2 class="section-title font-bold text-neutral-900 text-lg lg:border-t lg:pt-2 lg:border-b lg:pb-2 lg:border-t-neutral-900 lg:border-b-neutral-300">Berita Terbaru</h2>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-6">
            @foreach ($this->articles as $article)
                <livewire:article.card type="flash" :article="$article" />
            @endforeach
        </div>
    </livewire:base::container>
</section>