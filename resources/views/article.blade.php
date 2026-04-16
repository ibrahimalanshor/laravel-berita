@extends('layouts.home')

@section('content')

<x-base.container :paddless="true" class="py-4 space-y-4 sm:px-4">
    <nav class="px-4 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:pb-2 sm:border-neutral-200 sm:px-0">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right] text-neutral-400"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['category' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <div class="grid grid-cols-1 divide-y divide-neutral-200 gap-6 sm:grid-cols-5 sm:divide-y-0 lg:grid-cols-6">
        <div class="sm:col-span-3 lg:col-span-4 space-y-6 pb-6 sm:pb-0">
            <article class="px-4 space-y-4 sm:px-0">
                <header class="space-y-2">
                    <h1 class="font-bold text-neutral-900 text-3xl/8 sm:text-4xl">{{ $article->title }}</h1>
                    <p class="text-lg/6 text-neutral-700">{{ $article->summary }}</p>

                    <div class="text-sm flex items-center justify-between">
                        <div>
                            <a href="{{ route('author.detail', ['author' => $article->author->slug])}}" class="text-red-700 font-medium hover:underline">{{ $article->author->name }}</a>
                            <p class="text-xs text-neutral-700 sm:text-sm">Terbit {{ formatDate($article->published_at) }}</p>
                        </div>

                        <div class="flex items-center gap-2 sm:flex-col sm:items-end">
                            @auth
                                <x-article.action :article="$article" />
                            @endauth
                            <x-article.share :article="$article" />
                        </div>
                    </div>
                </header>

                <figure>
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full object-cover">

                    <figcaption class="text-xs text-neutral-700 mt-1">{{ $article->thumbnail_caption }}</figcaption>
                </figure>

                <div class="prose prose-neutral prose-a:text-red-700 max-w-none">
                    {!! $article->content !!}
                </div>
            </article>

            <hr class="border-neutral-200">

            <section class="px-4 space-y-2 lg:border-b-0 sm:px-0">
                <h2 class="font-bold text-neutral-900 text-lg">Topik Terkait</h2>

                <ul class="flex flex-wrap gap-2">
                    @foreach ($article->tags as $tag)
                        <li>
                            <x-tag.link :tag="$tag" />
                        </li>
                    @endforeach
                </ul>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="px-4 space-y-4 lg:border-b-0 sm:px-0">
                <x-article.section-title>{{ $article->category->name }}</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                    @foreach ($categoryArticles as $article)
                        <x-article.card :article="$article" type="article-category" />
                    @endforeach
                </div>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="px-4 space-y-4 sm:px-0 md:pb-0">
                <x-article.section-title>Artikel Terkait</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-6">
                    @foreach ($relatedArticles as $article)
                        <x-article.card :article="$article" type="related-article" />
                    @endforeach
                </div>
            </section>
        </div>

        <x-article.sidebar class="sm:col-span-2 space-y-6" :bordered-top="false" />
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