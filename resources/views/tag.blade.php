@extends('layouts.home')

@section('content')
<x-base.container class="mt-6">
    <h1 class="font-bold text-neutral-900 text-3xl">#{{ $tag->name }}</h1>
</x-base.container>
<x-base.container :paddless="true" class="mb-2 sm:px-4 lg:mb-4">
    <section id="highlight-article" class="splide py-4" aria-label="Berita Utama Kategori {{ $tag->name }}">
        <h2 class="sr-only">Berita Utama Kategori {{ $tag->name }}</h2>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                @foreach ($highlights as $article)
                    <x-article.card type="highlight" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $loop->first]) />
                @endforeach
            </div>
        </div>
    </section>
</x-base.container>

<x-base.container :paddless="true" class="border-t border-neutral-200 pt-4 grid grid-cols-1 gap-6 sm:grid-cols-5 sm:px-4 lg:border-0 lg:pt-0">
    <section class="space-y-4 px-4 lg:border-b-0 sm:col-span-3 sm:px-0">
        <x-article.section-title>Berita Terbaru {{ $tag->name }}</x-article.section-title>

        <div class="space-y-8">
            <div class="grid grid-cols-1 gap-4 lg:gap-6">
                @foreach ($articles as $article)
                    <x-article.card :article="$article" type="category-detail" />
                @endforeach
            </div>

            {{ $articles->links('article.pagination') }}
        </div>
    </section>
    <x-article.sidebar class="sm:col-span-2 space-y-6 border-t border-neutral-200 pt-6 sm:border-0 sm:pt-0" />
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
    createSlider('#main-article').mount();
    createSlider('#editor-article').mount();
}
</script>
@endpush