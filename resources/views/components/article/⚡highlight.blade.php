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

<livewire:base::container :paddless="true" class="sm:px-4">
    <section class="splide py-4" aria-label="Rekomendasi Artikel">
        <h2 class="sr-only">Rekomendasi Artikel</h2>
        <div class="splide__track">
            <ul class="splide__list article-highlight-slide sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                @foreach ($this->articles as $article)
                    <article @class(['splide__slide relative sm:space-y-2', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $article['featured']])>
                        <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}" class="rounded-lg h-[225px] object-cover sm:h-auto sm:rounded-none">
                        <div class="
                            absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                            sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none
                        ">
                            <h3 @class(['font-bold text-lg/6', 'sm:text-base/5' => !$article['featured'], 'sm:text-xl' => $article['featured']])>{{ $article['title'] }}</h3>
                            <div class="text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700">
                                <a href="" class="sm:text-sky-700 sm:font-medium">{{ $article['category'] }}</a>
                                <span>|</span>
                                <time>{{ $article['date'] }}</time>
                            </div>
                            @if ($article['featured'])
                                <p class="hidden sm:block sm:text-neutral-700">{{ $article['summary'] }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </ul>
        </div>
    </section>
</livewire:base::container>

<script>
new Splide('.splide', {
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