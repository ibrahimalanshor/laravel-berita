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
    }
};
?>

<x-article.section {{ $attributes }}>
    <x-base.container :paddless="true">
        <div id="editor-pick-article" class="splide space-y-4">
            <div class="px-4">
                <x-article.section-title>Pilihan Editor</x-article.section-title>
            </div>
            <div class="splide__track px-4 ">
                <ul class="splide__list splide__list__grid sm:grid-cols-5 sm:gap-4">
                    @foreach ($this->articles as $article)
                        <x-article.card :article="$article" type="editor" @class(['splide__slide']) />
                    @endforeach
                </ul>
            </div>
        </div>
    </x-base.container>
</x-article.section>

<script>
new Splide('#editor-pick-article', {
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