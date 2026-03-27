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
                'title' => 'Godzilla El Nino: Bencana Ekologis dan Ekonomi Nelayan Indonesia',
                'category' => 'News Plus',
                'date' => '1 jam lalu',
                'summary' => 'Furqon mengingatkan fenomena \'Godzilla\' El Nino akan menyulitkan bagi nelayan tradisional karena stok ikan menurun dan membuat nelayan melaut lebih jauh.',
                'thumbnail' => asset('articles/ilustrasi-godzilla-el-nino_01_ratio-16x9.jpg'),
                'featured' => true
            ],
            [
                'title' => 'Tidak Benar, Natalius Pigai Setujui Yaqut Jadi Tahanan Rumah',
                'category' => 'Periksa Fakta',
                'date' => '3 jam lalu',
                'thumbnail' => asset('articles/header-periksa-fakta---pigai-menjelaskan-yaqut-korupsi-sesuai-prosedur_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'title' => 'Anomali Ekstrem: Mengapa Harga Emas Anjlok di Tengah Perang Iran',
                'category' => 'Ekonomi',
                'date' => '7 jam lalu',
                'thumbnail' => asset('articles/antarafoto-harga-emas-tembus-dua-juta-rupiah-1756790454_3341_ratio-16x9.webp'),
                'featured' => false
            ],
            [
                'title' => 'Di Balik Penghentian Enkripsi End-to-End pada DM Instagram',
                'category' => 'Byte',
                'date' => '20 jam lalu',
                'thumbnail' => asset('articles/istock-2167818719_ratio-16x9.jpg'),
                'featured' => false
            ],
            [
                'title' => 'Menyelipkan Mata-mata di Ban Mobil',
                'category' => 'Gearbox',
                'date' => 'Rabu, 25 Mar',
                'thumbnail' => asset('articles/istock-1179996623_ratio-16x9.webp'),
                'featured' => false
            ]
        ];
    }
};
?>

<div>
    @foreach ($this->articles as $article)
        <article>
            <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}">
            <a href="">{{ $article['category'] }}</a>
            <time>{{ $article['date'] }}</time>
            <h2>{{ $article['title'] }}</h2>
            @if ($article['featured'])
                <p>{{ $article['summary'] }}</p>
            @endif
        </article>
    @endforeach
</div>