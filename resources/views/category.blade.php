@extends('layouts.home')

@section('content')
<x-base.container>
    <h1>{{ $category->name }}</h1>
</x-base.container>
<x-base.container :paddless="true" class="sm:px-4">
    <section id="highlight-article" class="splide py-4" aria-label="Rekomendasi Artikel">
        <h2 class="sr-only">Berita Utama</h2>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                @foreach ($highlights as $article)
                    <x-article.card type="highlight" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $loop->first]) />
                @endforeach
            </div>
        </div>
    </section>
</x-base.container>

<x-base.container>
    <section class="space-y-4 lg:border-b-0">
        <x-article.section-title>Berita Terbaru {{ $category->name }}</x-article.section-title>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
            @foreach ($categoryArticles as $article)
                <x-article.card :article="$article" type="article-category" />
            @endforeach
        </div>
    </section>
</x-base.container>
@endsection

@push('scripts')
<script>
window.onload = function () {
    function createSlider(el) {
        return new Splide(el, {
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
        });
    }

    createSlider('#highlight-article').mount();
}
</script>
@endpush