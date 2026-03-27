<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function articles()
    {
        return [
            [
                'title' => 'Blunder KPK Mengistimewakan Yaqut Cholil Jadi Tahanan Rumah',
                'category' => 'News',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/antarafoto-yaqut-cholil-qoumas-kembali-ke-tahanan-kpk-1774369510_ratio-16x9.jpg')
            ],
            [
                'title' => 'Rencana WFA-Belajar Daring: Solusi Cepat atau Ilusi Hemat BBM?',
                'category' => 'Ekonomi',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/antarafoto-pemerintah-berlakukan-wfa-lebaran-2026-1773848415_10947_ratio-16x9.jpg')
            ],
            [
                'title' => 'OJK Beri Sanksi Administrasi Bank NEO',
                'category' => 'Ekonomi',
                'date' => '5 jam lalu',
                'thumbnail' => asset('articles/pertumbuhan-aset-perbankan-di-ntb-antarafoto_ratio-16x9.jpg')
            ],
            [
                'title' => 'Hukum yang Mengintai: Catatan Tubuh Perempuan & KUHP Baru',
                'category' => 'Diajeng',
                'date' => 'Kamis, 26 Mar',
                'thumbnail' => asset('articles/ilustrasi-gerakan-tangan-untuk-mengekspresikan-berbagai-perasaan_ratio-16x9.webp')
            ],
            [
                'title' => 'Alasan KPPU Putus Bersalah 97 Pinjol di Kasus Kartel Suku Bunga',
                'category' => 'Ekonomi',
                'date' => '18 jam lalu',
                'thumbnail' => asset('articles/kartel-bunga-pinjol-8ae4pg.1774532979172_ratio-16x9.jpeg')
            ],
        ];
    }
};
?>

<div>
    <h2>Pilihan Editor</h2>
    @foreach ($this->articles as $article)
        <article>
            <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}">
            <a href="">{{ $article['category'] }}</a>
            <time>{{ $article['date'] }}</time>
            <h3>{{ $article['title'] }}</h3>
        </article>
    @endforeach
</div>