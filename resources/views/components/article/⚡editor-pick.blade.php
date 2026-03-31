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

<div {{ $attributes->class('border-t border-neutral-300 md:border-neutral-900 lg:border-0') }}>
    <livewire:base::container :paddless="true" class="py-4">
        <section id="editor-pick-article" class="splide space-y-4">
            <div class="px-4">
                <div class="section-title lg:border-t lg:pt-2 lg:border-b lg:pb-2 lg:border-t-neutral-900 lg:border-b-neutral-300">
                    <h2 class="font-bold text-lg">Pilihan Editor</h2>
                </div>
            </div>
            <div class="splide__track px-4 ">
                <ul class="splide__list editor-pick-article-slide-list sm:grid-cols-5 sm:gap-4">
                    @foreach ($this->articles as $article)
                        <livewire:article.card :article="$article" :enable-featured="false" @class(['splide__slide']) />
                    @endforeach
                </ul>
            </div>
        </section>
    </livewire:base::container>
</div>

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