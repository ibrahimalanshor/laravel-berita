@extends('layouts.home')

@section('content')

<x-base.container class="py-4 space-y-2 sm:space-y-6">
    <nav class="pb-2 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:border-neutral-200">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right] text-neutral-400"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['slug' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <div class="grid grid-cols-1 sm:grid-cols-5 lg:grid-cols-6">
        <div class="sm:col-span-3 lg:col-span-4 divide-y divide-neutral-200 space-y-4">
            <article class="space-y-4 pb-4">
                <header class="space-y-2">
                    <h1 class="font-bold text-neutral-900 text-3xl/8 sm:text-4xl">{{ $article->title }}</h1>
                    <p class="text-lg/6 text-neutral-700">{{ $article->summary }}</p>

                    <div class="text-sm flex items-center justify-between">
                        <div>
                            <a href="" class="text-sky-600 font-medium">Supriyanto</a>
                            <p class="text-xs text-neutral-700 sm:text-sm">Terbit {{ formatDate($article->published_at) }}</p>
                        </div>

                        <button class="text-neutral-700">
                            <span class="icon-[tabler--share-3]"></span>
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

            <section class="pb-6 space-y-2 lg:border-b-0 lg:pb-2">
                <h2 class="font-bold text-neutral-900 text-lg">Topik Terkait</h2>

                <ul class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <x-tag.link :tag="$tag" />
                    @endforeach
                </ul>
            </section>

            <section class="pb-6 space-y-4 lg:border-b-0 lg:pb-2">
                <x-article.section-title>{{ $article->category->name }}</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                    @foreach ($article->category->articles as $article)
                        <x-article.card :article="$article" type="article-category" />
                    @endforeach
                </div>
            </section>

            <section class="pb-6 space-y-4 md:pb-0">
                <x-article.section-title>Artikel Terkait</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-6">
                    @foreach ($article->category->articles as $article)
                        <x-article.card :article="$article" type="related-article" />
                    @endforeach
                </div>
            </section>
        </div>

        <aside class="sm:col-span-2">
            <section>
                <h2>Berita Utama</h2>
            </section>
            <section>
                <h2>Pilihan Editor</h2>
            </section>
        </aside>
    </div>
</x-base.container>

@endsection