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

<x-base.container :paddless="true" class="sm:px-4">
    <section id="highlight-article" class="splide py-4" aria-label="Rekomendasi Artikel">
        <h2 class="sr-only">Rekomendasi Artikel</h2>
        <div class="splide__track">
            <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                @foreach ($this->articles as $article)
                    <x-article.card type="highlight" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $article['featured']]) />
                @endforeach
            </ul>
        </div>
    </section>
</x-base.container>

<script>
new Splide('#highlight-article', {
    mediaQuery: 'min',
    breakpoints: {
        640: {
            destroy: 'completely'
        }
    },
    pagination: false,
    arrows: false,
    padding: '2rem',
    gap: '1rem',
    type: 'loop'
}).mount();
</script>