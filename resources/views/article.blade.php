@extends('layouts.home')

@section('content')

<x-base.container class="py-4 space-y-4 ">
    <nav class="flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:pb-2 sm:border-neutral-200">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right] text-neutral-400"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['slug' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <div class="grid grid-cols-1 divide-y divide-neutral-200 gap-6 sm:grid-cols-5 sm:divide-y-0 lg:grid-cols-6">
        <div class="sm:col-span-3 lg:col-span-4 space-y-6 pb-6 sm:pb-0">
            <article class="space-y-4">
                <header class="space-y-2">
                    <h1 class="font-bold text-neutral-900 text-3xl/8 sm:text-4xl">{{ $article->title }}</h1>
                    <p class="text-lg/6 text-neutral-700">{{ $article->summary }}</p>

                    <div class="text-sm flex items-center justify-between">
                        <div>
                            <a href="" class="text-sky-600 font-medium">Supriyanto</a>
                            <p class="text-xs text-neutral-700 sm:text-sm">Terbit {{ formatDate($article->published_at) }}</p>
                        </div>

                        <button class="text-neutral-700">
                            <span class="icon-[tabler--share] size-5"></span>
                        </button>
                    </div>
                </header>

                <figure>
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full object-cover">

                    <figcaption class="text-xs text-neutral-700 mt-1">{{ $article->thumbnail_caption }}</figcaption>
                </figure>

                <div class="prose prose-neutral prose-a:text-sky-600 max-w-none">
                    {!! $article->content !!}
                </div>
            </article>

            <hr class="border-neutral-200">

            <section class="space-y-2 lg:border-b-0">
                <h2 class="font-bold text-neutral-900 text-lg">Topik Terkait</h2>

                <ul class="flex flex-wrap gap-2">
                    @foreach ($article->tags as $tag)
                        <x-tag.link :tag="$tag" />
                    @endforeach
                </ul>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="space-y-4 lg:border-b-0">
                <x-article.section-title>{{ $article->category->name }}</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                    @foreach ($categoryArticles as $article)
                        <x-article.card :article="$article" type="article-category" />
                    @endforeach
                </div>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="space-y-4 md:pb-0">
                <x-article.section-title>Artikel Terkait</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-6">
                    @foreach ($relatedArticles as $article)
                        <x-article.card :article="$article" type="related-article" />
                    @endforeach
                </div>
            </section>
        </div>

        <aside class="sm:col-span-2 space-y-6">
            <section id="main-article" class="splide space-y-4 -mx-4 sm:mx-0" aria-label="Rekomendasi Artikel">
                <div class="px-4 sm:p-0">
                    <x-article.section-title :bordered-top="false">Berita Utama</x-article.section-title>
                </div>
                <div class="splide__track">
                    <div class="splide__list splide__list__grid sm:gap-6">
                        @foreach ($article->category->articles as $article)
                            <x-article.card type="highlight-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                        @endforeach
                    </div>
                </div>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section id="editor-article" class="splide space-y-4 -mx-4 sm:m-0" aria-label="Rekomendasi Artikel">
                <div class="px-4 sm:p-0">
                    <x-article.section-title :bordered-top="false">Pilihan Editor</x-article.section-title>
                </div>
                <div class="splide__track">
                    <div class="splide__list splide__list__grid sm:gap-6">
                        @foreach ($article->category->articles as $article)
                            <x-article.card type="editor-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                        @endforeach
                    </div>
                </div>
            </section>
        </aside>
    </div>
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

    createSlider('#main-article').mount();
    createSlider('#editor-article').mount();
}
</script>
@endpush